<?php
    namespace AuthDoctrine\Controller;

    use AuthDoctrine\Form\LoginFilter;
    use AuthDoctrine\Form\LoginForm;
    use MisLibrerias\DbFactory;
    use Zend\Authentication\Result;
    use Zend\Debug\Debug;
    use Zend\Filter\Encrypt;
    use Zend\Mvc\Controller\AbstractActionController;
    use Zend\Serializer\Serializer;
    use Zend\Session\Container;
    use Zend\View\Model\ViewModel;
    use AuthDoctrine\Entity\Usuario;

    class IndexController extends AbstractActionController
    {

        /**
         * @var Doctrine\ORM\EntityManager
         */
        protected $em;

        public function indexAction()
        {
            $layout = $this->layout('layout/layout-login');
            $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
            if (!$auth->hasIdentity()) {
                return $this->redirect()->toRoute('auth-doctrine/login');
            }

            $users = null; //$em->getRepository('Application\Entity\Usuario')->findAll();
            $message = $this->params()->fromQuery('message', 'foo');
            return new ViewModel(array(
                'message' => $message,
                'users' => $users,
            ));
        }

        public function loginAction()
        {
            $this->layout('layout/layout-login');
            $request = $this->params()->fromPost('aplicaciones', '');

            $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

            //Obteniendo nombre de bases de datos externas
            $configIni = new \Zend\Config\Reader\Ini();
            $config = $configIni->fromFile(getcwd() . "/config/config-general.ini");
            $bdSeguridad = $config['bd_local']['seguridad'];

            //Obteniendo nombre de bases de datos local
            //$config = $this->getServiceLocator()->get('config');
            //$connectionSeguridad = $config['doctrine']['connection']['orm_default']['params']['dbname'];

            $form = new LoginForm();
            $messages = null;
            //Debug::dump($this->getServiceLocator());
            if ($request == "") {

                /*
                $auth->clearIdentity();
                $sessionManager = new \Zend\Session\SessionManager();
                $sessionManager->forgetMe();
                $session = new Container('datos_sesion');
                $session->datos_sesion = null;
                */

                $this->clearSession();

            } elseif ($auth->hasIdentity()) {
                $identity = $auth->getIdentity();

                $entityManager = $this->getEntityManager($bdSeguridad);
                $sql = "select distinct p.id_aplicacion, a.*
							from seguridad.perfil p left join seguridad.aplicacion a on a.id = p.id_aplicacion
							WHERE p.id in
								(select up.id_perfil
								from seguridad.usuario_perfil up
								WHERE up.id_usuario = " . $identity->getUsrId() . "
								and up.estado = true)
								and p.estado = true
								and a.estado = true
							ORDER BY 2";
                $util = new \Application\Entity\Repositories\UtilsRepository($entityManager);
                $aplicacionesRegistradas = $util->execNativeSql($sql);

                $listaAplicaciones = array('' => 'Seleccione');
                foreach ($aplicacionesRegistradas as $app) {
                    $listaAplicaciones[$app['id']] = $app['nombre'];
                }

                $form = new LoginForm();
                $form->get('aplicaciones')->setAttribute('options', $listaAplicaciones);
                $form->get('aplicaciones')->setAttribute('required', 'required');

                $this->clearSession();
            }

            $aplicacionesRegistradas = array();

            $request = $this->getRequest();
            //Debug::dump($request->isPost()); exit();
            if ($request->isPost()) {
                $form->setInputFilter(new LoginFilter($this->getServiceLocator()));
                //$form->setInputFilter(new LoginFilter(''));
                //Debug::dump($request->isPost()); exit();
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $data = $form->getData();


                    //Debug::dump($data);exit();
                    $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
                    $adapter = $authService->getAdapter();
                    $adapter->setIdentityValue($data['username']);
                    $adapter->setCredentialValue($data['password']);
                    $authResult = $authService->authenticate();

                    switch ($authResult->getCode()) {

                        case Result::FAILURE_IDENTITY_NOT_FOUND:
                            $messages = "Usuario no válido.";
                            break;

                        case Result::FAILURE_CREDENTIAL_INVALID:
                            $messages = "Credenciales no válidas.";
                            break;

                        case Result::SUCCESS:
                            $messages = "Seleccione una aplicación.";
                            break;

                        default:
                            $messages = "sssss";
                            break;
                    }

                    if ($authResult->isValid()) {
                        $identity = $authResult->getIdentity();

                        $usrIdPersona = 0;
                        if ($identity->getUsrIdPersona()) {
                            $usrIdPersona = $identity->getUsrIdPersona();
                        }

                        //******************************************************************

                        if (!isset($data['aplicaciones']) || $data['aplicaciones'] == "") {
                            $entityManager = $this->getEntityManager($bdSeguridad);
                            $sql = "select distinct p.id_aplicacion, a.*
								from seguridad.perfil p left join seguridad.aplicacion a on a.id = p.id_aplicacion
								WHERE p.id in
									(select up.id_perfil
									from seguridad.usuario_perfil up
									WHERE up.id_usuario = " . $identity->getUsrId() . "
									and up.estado = true)
									and p.estado = true
									and a.estado = true
								ORDER BY 2";
                            $util = new \Application\Entity\Repositories\UtilsRepository($entityManager);
                            $aplicacionesRegistradas = $util->execNativeSql($sql);

                            $listaAplicaciones = array('' => '--Seleccione una Aplicación--');
                            foreach ($aplicacionesRegistradas as $app) {
                                $listaAplicaciones[$app['id']] = $app['nombre'];
                            }

                            $form->get('aplicaciones')->setAttribute('options', $listaAplicaciones);
                            $form->get('aplicaciones')->setAttribute('required', 'required');
                            //echo count($aplicacionesRegistradas);
                            //Debug::dump($form->get('password'));
                            if (count($aplicacionesRegistradas) > 1) {
                                return new ViewModel(array(
                                    'error' => 'Your authentication credentials are not valid',
                                    'form' => $form,
                                    'messages' => $messages,
                                    'aplicacionesRegistradas' => $aplicacionesRegistradas,
                                ));
                            } elseif (count($aplicacionesRegistradas) == 1) {
                                $idAplicacionRegistradaSeleccionada = $aplicacionesRegistradas[0]['id_aplicacion'];
                            }
                        } else {

                            $idAplicacionRegistradaSeleccionada = $data['aplicaciones'];
                        }
                        //******************************************************************
                        //Debug::dump($idAplicacionRegistradaSeleccionada);
                        //Debug::dump($identity->getUsrId());
                        //Debug::dump($usrIdPersona); exit();
                        $entityManager = $this->getEntityManager($bdSeguridad);
                        $sql = "SELECT * FROM seguridad.persona WHERE id_persona = " . $usrIdPersona . "";
                        $util = new \Application\Entity\Repositories\UtilsRepository($entityManager);
                        $persona = $util->execNativeSql($sql);

                        $nombrePersonaMof = "";
                        $cargoMof = "";
                        $puestoMof = "";
                        $idPersonaMof = "";
                        $nombreUnidadMof = "";
                        $nombreEntidadMof = "";
                        $siglaEntidadMof = "";
                        $siglaUnidadMof = "";
                        $idEntidadMof = "";
                        $idUnidadMof = "";
                        $ciMof = "";
                        if (isset($persona) && count($persona) > 0) {
                            $persona = $persona[0];
                            $nombrePersonaMof = $persona['nombres'] . " " . $persona['paterno'] . " " . $persona['materno'];
                            $cargoMof = $persona['cargo'];
                            $puestoMof = $persona['puesto'];
                            $idPersonaMof = $persona['id_persona'];
                            $nombreEntidadMof = $persona['entidad'];
                            $siglaEntidadMof = $persona['sigla_entidad'];
                            $idUnidadMof = $persona['id_unidad'];
                            $siglaUnidadMof = $persona['sigla_unidad'];
                            $nombreUnidadMof = $persona['unidad'];
                            $idEntidadMof = $persona['id_entidad'];
                            $ciMof = $persona['ci'];
                        }


                        $entityManager = $this->getEntityManager($bdSeguridad);
                        $sql = "SELECT p.id, p.nombre, p.sigla, p.orden
							FROM seguridad.usuario_perfil up left join seguridad.perfil p on up.id_perfil = p.id
							    left join seguridad.usuario u on up.id_usuario = u.usr_id
							where up.id_usuario = " . $identity->getUsrId() . "
							AND p.id_aplicacion = " . $idAplicacionRegistradaSeleccionada . "
							AND up.estado = true
							and p.estado = true
							ORDER BY p.orden";
                        $util = new \Application\Entity\Repositories\UtilsRepository($entityManager);
                        $perfiles = $util->execNativeSql($sql);
                        $listaPerfiles = array();
                        $listaIndexPerfiles = array();
                        if ($perfiles) {
                            foreach ($perfiles as $perfil) {
                                $listaPerfiles[$perfil['nombre']] = $perfil['sigla'];
                                $listaIndexPerfiles[] = $perfil['id'];
                            }
                        }


                        $listaIndexPerfiles = implode(",", $listaIndexPerfiles);


                        $entityManager = $this->getEntityManager($bdSeguridad);
                        $query = $entityManager->createQuery('SELECT up FROM \AuthDoctrine\Entity\UsuarioPerfil up
											WHERE up.idUsuario = :idUsuario
											AND up.idPerfil in (' . $listaIndexPerfiles . ')
											AND up.estado = true');
                        $query->setParameter('idUsuario', $identity->getUsrId());
                        $usuarioPerfilResult = $query->getArrayResult();

                        $query = $entityManager->createQuery('SELECT p FROM \AuthDoctrine\Entity\Perfil p
											WHERE p.id = :id');
                        $query->setParameter('id', $usuarioPerfilResult[0]["idPerfil"]);
                        $perfilResult = $query->getArrayResult();

                        $query = $entityManager->createQuery('SELECT a FROM \AuthDoctrine\Entity\Aplicacion a
											WHERE a.id = :id');
                        $query->setParameter('id', $perfilResult[0]["idAplicacion"]);
                        $aplicacionResult = $query->getArrayResult();
                        $urlAplicacion = $aplicacionResult[0]["url"];

                        //*****************************************************
                        // OBTENIENDO DESCRIPCION UNIDAD EJECUTORA
                        $unidad_ejecutora = null;
                        $em = $this->getEntityManager($bdSeguridad);
                        $id_unidad = $usuarioPerfilResult[0]["idUnidad"];
                        $sql = "select id_unidad, sigla, denominacion, nivel from seguridad.unidad where id_unidad = " . $id_unidad;
                        //$sql = "select id_unidad, sigla, descripcion, nivel from estructura_organizacional where id_unidad = ". $id_unidad;
                        //$sql = "select id_unidad, sigla, denominacion, nivel from get_unidad_padre($id_unidad_ejecutora,$nivel)";
                        $utilRepo = new \Application\Entity\Repositories\UtilsRepository($em);
                        $registro = $utilRepo->execNativeSql($sql);
                        if ($registro) {
                            $unidad_ejecutora = $registro[0];
                            $id_unidad_ejecutora = $registro[0]['id_unidad'];
                        } else {
                            $sql = "select id_unidad, sigla, denominacion as descripcion, nivel from seguridad.unidad where id_unidad = " . $idUnidadMof;
                            //$sql = "select id_unidad, sigla, denominacion, nivel from get_unidad_padre($idUnidadMof,$nivel)";
                            $utilRepo = new \Application\Entity\Repositories\UtilsRepository($em);
                            $registro = $utilRepo->execNativeSql($sql);
                            $unidad_ejecutora = $registro[0];
                            $id_unidad_ejecutora = $registro[0]['id_unidad'];
                        }
                        //Debug::dump($unidad_ejecutora); exit();
                        //*****************************************************

                        $datosSesionArray = array(
                            'id_usuario' => $identity->getUsrId(),
                            'mail_usuario' => $identity->getUsrEmail(),
                            'lista_perfiles' => $listaPerfiles,
                            'id_rol' => $perfilResult[0]["id"],
                            'nombre_rol' => $perfilResult[0]["nombre"],
                            'sigla_rol' => $perfilResult[0]["sigla"],
                            'id_aplicacion' => $aplicacionResult[0]["id"],
                            'sigla_aplicacion' => $aplicacionResult[0]["sigla"],
                            'nombre_aplicacion' => $aplicacionResult[0]["nombre"],
                            'url' => $aplicacionResult[0]["url"],
                            'id_persona' => $idPersonaMof,
                            'ci_persona' => $ciMof,
                            'login_usuario' => $identity->getUsrName(),
                            'nombre_usuario' => $nombrePersonaMof,
                            'cargo' => $cargoMof,
                            'puesto' => $puestoMof,
                            'nombre_entidad' => $nombreEntidadMof,
                            'sigla_entidad' => $siglaEntidadMof,
                            'entidad' => $nombreEntidadMof,
                            'id_entidad' => $idEntidadMof,
                            'id_unidad_mof' => $idUnidadMof,
                            'unidad_organizacional' => $usuarioPerfilResult[0]["idUnidad"],
                            'unidad_organizacional_sigla' => $siglaUnidadMof,
                            'unidad_organizacional_nombre' => $nombreUnidadMof,
                            'fechaHoraIngreso' => date("d-m-Y H:i:s"),
                            'rememberme' => $data['rememberme'] ? $data['rememberme'] : false,
                            'id_unidad_ejecutora' => $id_unidad_ejecutora,
                            'unidad_ejecutora' => $unidad_ejecutora,
                            'unidad_organizacional_nombre_poa_ppto' => $unidad_ejecutora,
                            'session_id' => session_id(),
                        );

                        if ($aplicacionResult[0]["sigla"] == "SAA") {

                            $session = new Container('datos_sesion');
                            $session->datos_sesion = $datosSesionArray;
                            $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
                            $authService->getStorage()->write($identity);
                            $time = 1209600; // 14 days 1209600/3600 = 336 hours => 336/24 = 14 days
                            //if ($data['rememberme']) $authService->getStorage()->session->getManager()->rememberMe($time); // no way to get the session
                            if ($data['rememberme']) {
                                $sessionManager = new \Zend\Session\SessionManager();
                                $sessionManager->rememberMe($time);
                            }
                            return $this->redirect()->toRoute('home');
                        } else {

                            $this->clearSession();

                            $parametros = Serializer::serialize($datosSesionArray);
                            return $this->redirect()->toUrl($urlAplicacion . '/application/base/index?id=' . $parametros);
                        }

                        //return $this->redirect()->toUrl('http://sipp-pruebas.economiayfinanzas.gob.bo/application/base/index?id='.$s);
                    }
                }
            }

            return new ViewModel(array(
                'error' => 'Your authentication credentials are not valid',
                'form' => $form,
                'messages' => $messages,
            ));
        }

        public function logoutAction()
        {
            $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

            if ($auth->hasIdentity()) {
                $identity = $auth->getIdentity();
            }
            $auth->clearIdentity();
            $sessionManager = new \Zend\Session\SessionManager();
            $sessionManager->forgetMe();

            $session = new Container('datos_sesion');
            $session->datos_sesion = null;

            $configIni = new \Zend\Config\Reader\Ini();
            $config = $configIni->fromFile(getcwd() . "/config/config-general.ini");

            return $this->redirect()->toUrl($config['seguridad']['url_logout']);
        }

        public function clearSession()
        {
            $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

            if ($auth->hasIdentity()) {
                $identity = $auth->getIdentity();
            }
            $auth->clearIdentity();

            $sessionManager = new \Zend\Session\SessionManager();
            $sessionManager->forgetMe();

            $session = new Container('datos_sesion');
            $session->datos_sesion = null;

        }

        public function getEntityManager($database = 'bonos-tesoro-dc')
        {
// 		if (null === $this->em) {
// 			$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
// 		}

            $applicationConfig = $this->getServiceLocator()->get('config');
            $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $emDefaultConfig = $em->getConfiguration();

            $dbFactory = new DbFactory($applicationConfig);
            $anotherConnection = $dbFactory->getConnectionToDatabase($database);
            $anotherEntityManager = $dbFactory->getEntityManager($anotherConnection, $emDefaultConfig);

            $this->em = $anotherEntityManager;

            return $this->em;
        }
    }