<?php
    namespace Formulacion\Controller;

    use Application\Controller\BaseController;
    use Application\Entity\Repositories\UtilsRepository;
    use Formulacion\Form\FormPeriodo;
    use MisLibrerias\DatosSesion;
    use MisLibrerias\NumbersWords;
    use Zend\Debug\Debug;
    use Zend\Json\Json;
    use Zend\Mvc\Controller\AbstractActionController;
    use Zend\View\Model\ViewModel;

    class IndexController extends BaseController
    {

        public $listaItemsSupervisaLocal = array();

        public function indexAction()
        {

            $sql = "select gp.* from gestion_periodo gp where gp.gestion = 2017 and vigencia = 'V'";

            $util = new UtilsRepository($this->getEntityManager());
            $listadoDatos = $util->execNativeSql($sql);
            $viewmodel = new ViewModel(
                array(
                    'listadoDatos' => 	$listadoDatos,
                )
            );
            return $viewmodel;

        }

        public function nuevoAction(){

            $request = $this->getRequest();
            $viewmodel = new ViewModel();
            $viewmodel->setTerminal($request->isXmlHttpRequest());

            $bdid = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
            //Debug::dump($bdid);



            $form = new FormPeriodo('frmPeriodo' , $bdid );

            if ($bdid != '0') {
                $basesRepository = new ParametrosRepository($this->getEntityManager());
                $dato = $basesRepository->getForm($bdid);
                //Debug::dump($dato);
                $form -> setData($dato);

            }


            if (!$this->request->isPost()) {

                $viewmodel->setVariables(array(
                                             "form"=>$form,
                                             "id_gp" => $bdid,
                                         ));
                return $viewmodel;
            }

            $data = $request->getPost()->toArray();
            unset($data['Registrar']);
            $form->setData($data);

            if($form->isValid()){


                $files = $request->getFiles()->toArray();


                //$SaveDataRepository = new ParametrosRepository($this->getEntityManager());
                //$respuesta = $SaveDataRepository->saveData($data, $files);



                //Debug::dump($files);
                //Debug::dump($data);

                //$data['idParametro'] = $respuesta['idParametro'];
                //Debug::dump($data);
                if (isset($files) && $files['archivo_adjunto']['name'] != ""){
                    if ($files['archivo_adjunto']['name'] != ""){
                        $respuesta = $this->adjuntarArchivo($data, $files);
                    }
                }else{

                    $SaveDataRepository = new ParametrosRepository($this->getEntityManager());
                    $respuesta = $SaveDataRepository->saveData($data);
                    //Debug::dump($respuesta);
                }


                echo Json::encode($respuesta);
                exit;
            }else{

                $respuesta = array (
                    "respuesta" => false,
                    "mensaje" => "FORMULARIO NO VALIDO.",
                );
                echo Json::encode($respuesta);
                exit;
            }


        }

        public function numberToWord(){

            //$miNumero = "1000137296512345";
            $miNumero = doubleval(123456789012345.89);


            Debug::dump($miNumero);


            $numeroFormatoDecimal = number_format($miNumero,2,'.','');
            $numeroFormatoMoneda = number_format($miNumero,2,',','.');

            $exp = explode('.',$numeroFormatoDecimal);
            Debug::dump($numeroFormatoDecimal);
            Debug::dump($exp);
            //$numWord = "(".$numeroFormatoMoneda.")<br>";

            $nw = new NumbersWords();
            $n1 = $nw->toWords($exp[0]);
            $n2 = $nw->toWords($exp[1]);

            if (!is_int($n1)) {
                // cast (sanitize) to int without losing precision
                $n1 = preg_replace('/^[^\d]*?(-?)[ \t\n]*?(\d+)([^\d].*?)?$/', '$1$2', $n1);
            }
            if (!is_int($n2)) {
                // cast (sanitize) to int without losing precision
                $n2 = preg_replace('/^[^\d]*?(-?)[ \t\n]*?(\d+)([^\d].*?)?$/', '$1$2', $n2);
            }


            $numWord = ucfirst(trim($n1)). " Bolivianos";
            if(isset($exp[1]) && $exp[1]!=0){
                $numWord .= " con ".trim($n2). " Centavos";
            }
            $numWord .= "<br>(".$numeroFormatoMoneda.")<br>";

            Debug::dump($numeroFormatoMoneda);
            Debug::dump($numWord);

        }


        public function listaUnidadesAction()
        {
            //$this->numberToWord();

            $idGp = $this->params()->fromRoute('id',$this->params()->fromQuery('id',1));
            $idUnidad = 100;//$this->params()->fromRoute('id2',$this->params()->fromQuery('id2',DatosSesion::getUnidad()));
            $idUnidadNivel = 0;//MisLibrerias\DatosSesion::getNivelUnidad();;

            //$sql = "select p.* from v_unidades_mefp p where p.id_unidad = ".DatosSesion::getUnidad();
            $sql = "select p.*
                    from fn_get_hijos_unidad(".$idUnidad.") p
                    where p.normativa ='1'
                    order by p.id_unidad,p.nivel" ;
            $util = new \Application\Entity\Repositories\UtilsRepository($this->getEntityManager());
            $listadoUnidades = $util->execNativeSql($sql);

           // Debug::dump($entityManager);

           // $this->setEntityManager('poai');
            $sql = "select gp.*
                    from gestion_periodo gp
                    where gp.gestion = 2017
                    and gp.vigencia = 'V'
                    ORDER BY gp.gestion,gp.periodo";

            $util2 = new \Application\Entity\Repositories\UtilsRepository($this->getEntityManager());
            $listadoPeriodos = $util2->execNativeSql($sql);

           /// Debug::dump($listadoPeriodos);


            $viewmodel = new ViewModel(
                array(
                    'listadoPeriodos' => 	$listadoPeriodos,
                    'listadoUnidades' => 	$listadoUnidades,
                    'idGp' => 	$idGp,
                    'idUnidad' => 	$idUnidad,
                    'idUnidadNivel' => 	$idUnidadNivel,
                )
            );
            return $viewmodel;
        }

        public function listaItemsAction()
        {

            $idGp = $this->params()->fromRoute('id',$this->params()->fromQuery('id',1));
            $idUnidad = $this->params()->fromRoute('id2',$this->params()->fromQuery('id2',DatosSesion::getUnidad()));

            //$sql = "select p.* from v_persona p where p.id_entidad = 35 and p.id_unidad = $idUnidad order by p.id_escala_nivel, p.escala_nivel, p.item";
            $sql = "select p.* ,
                    fp.id_poai,
                    fp.nro_item,
                    fp.gestion,
                    fp.estado,
                    fp.id_gp,
                    fp.id_persona as fp_id_persona
                    from v_persona p left join f_poai fp on p.item::integer = fp.nro_item  and fp.id_gp = $idGp
                    where p.id_entidad = 35
                    and p.id_unidad = $idUnidad
                    order by p.id_escala_nivel, p.escala_nivel, p.item";
            $util = new UtilsRepository($this->getEntityManager());
            $listadoItems = $util->execNativeSql($sql); //Debug::dump($listadoItems);

            $nombreUnidad = "";
            if(count($listadoItems)>0){
                $nombreUnidad = $listadoItems[0]['unidad'];
            }

            $viewmodel = new ViewModel(
                array(
                    'listadoItems' => 	$listadoItems,
                    'idUnidad' => $idUnidad,
                    'idGp' => $idGp,
                    'nombreUnidad' => $nombreUnidad,
                )
            );
            return $viewmodel;
        }

        public function addPoaiAction(){



            $idGp = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
            $idPersona = $this->params()->fromRoute('id2',$this->params()->fromQuery('id2',DatosSesion::getPersonaData('id_persona')));
            $idUnidad = $this->params()->fromRoute('id3',$this->params()->fromQuery('id3',DatosSesion::getUnidad()));
           // $idPoai = $this->params()->fromRoute('id4',$this->params()->fromQuery('id4',0));
            //Debug::dump($bdid);

            //Datos del Puesto, Persona
            $sql = "select
                          p.id_persona,
                          p.item as nro_item,
                          p.cargo as denominacion_cargo,
                          p.id_escala_nivel,
                          p.escala_nivel as nivel,
                          p.tc_categoria as categoria,
                          p.puesto as denominacion_puesto,
                          p.unidad as dependencia_organizacional,
                          p.id_entidad,
                          p.id_unidad,
                          p.sigla_unidad,
                          u.nivel as nivel_unidad
                    from v_persona p left join v_unidades u on p.id_unidad = u.id_unidad
                    where p.id_entidad = 35
                    and p.id_persona = $idPersona";
            $util = new UtilsRepository($this->getEntityManager());
            $personaData = $util->execNativeSql($sql);
            $personaData = $personaData[0];
            $nro_item = $personaData['nro_item'];

            $sqlQuery = "INSERT
                                INTO
                                    f_poai
                                    (
                                        nro_item,
                                        gestion,
                                        estado,
                                        id_gp,
                                        id_persona
                                    )
                                    VALUES
                                    (
                                        $nro_item,
                                        2017,
                                        '1',
                                        $idGp,
                                        $idPersona
                                    );

                            ";
            $utilRepo = new UtilsRepository($this->getEntityManager());
            $listaItemsSupervisa = $utilRepo->execNativeSql($sqlQuery);




                $respuesta = array (
                    "respuesta" => true,
                    "mensaje" => "SUCCESS.",
                );
                echo Json::encode($respuesta);
                exit;


        }

        public function cambiarestadoAction(){

            $id = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));

            $sqlQuery = "SELECT * FROM f_poai WHERE id_poai = ?;";  // echo $sqlQuery;
            $utilRepo = new UtilsRepository($this->getEntityManager());
            $poaiData = $utilRepo->execNativeSql($sqlQuery,array($id));
//Debug::dump($poaiData);
            $estado = null;
            if(($poaiData) && is_array($poaiData)){
                $poaiData = $poaiData[0];

                if ($poaiData['estado'] == false) {
                    $estado = '1';
                } else {
                    $estado = '0';
                }

            }else{
                $respuesta = array (
                    "respuesta" => false,
                    "mensaje" => $poaiData
                );
                echo Json::encode($respuesta);
                exit;
            }



            $sqlQuery = "UPDATE f_poai SET estado = ? WHERE id_poai = ?;";
            $utilRepo = new UtilsRepository($this->getEntityManager());
            $resultadoQuery = $utilRepo->executeSql($sqlQuery,array($estado,$id));

            //Debug::dump($resultadoQuery);
            if($resultadoQuery && is_bool($resultadoQuery)){
                $respuesta = array (
                    "respuesta" => true,
                    "mensaje" => "SE CAMBIO CORRECTAMENTE EL ESTADO."
                );
            }else{
                $respuesta = array (
                    "respuesta" => false,
                    "mensaje" => $resultadoQuery
                );
            }

            echo Json::encode($respuesta);
            exit;


        }

        public function fPoaiAction()
        {
            $idGp = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
            $idPersona = $this->params()->fromRoute('id2',$this->params()->fromQuery('id2',DatosSesion::getPersonaData('id_persona')));
            $idUnidad = $this->params()->fromRoute('id3',$this->params()->fromQuery('id3',DatosSesion::getUnidad()));
            $idPoai = $this->params()->fromRoute('id4',$this->params()->fromQuery('id4',0));

            //Debug::dump($idUnidad);

            $sqlOld = "select p.*
                    from v_persona p
                    where p.id_entidad = 35
                    and p.id_unidad = $idUnidad
                    order by id_escala_nivel, item
                    ";

            $sql = "select p.* ,
                    fp.id_poai,
                    fp.nro_item,
                    fp.gestion,
                    fp.estado,
                    fp.id_gp,
                    fp.id_persona as fp_id_persona
                    from v_persona p left join f_poai fp on p.item::integer = fp.nro_item  and fp.id_gp = $idGp
                    where p.id_entidad = 35
                    and p.id_unidad = $idUnidad
                    order by p.id_escala_nivel, p.escala_nivel, p.puesto, p.item ";

            $util = new UtilsRepository($this->getEntityManager());
            $listadoDependientes = $util->execNativeSql($sql);
            //Debug::dump($listadoDependientes);
            $listaDep = array();
            $nro = 0;
            foreach($listadoDependientes as $f){

                $nro++;

                $p = "ITEM: ".$f['item']." | CARGO: ".$f['cargo']." | PUESTO: ".$f['puesto'];
                //$listaDep[$f['id_persona']] = "[ITEM: ".$p . "] ".$f['paterno'] . " ".$f['materno'] . " ".$f['nombres'];

                $listaDepAux = array();

                $listaDepAux['id_persona'] = $f['id_persona'];
                $listaDepAux['id_poai'] = $f['id_poai'] != null? $f['id_poai']:0;
                $listaDepAux['persona'] = $nro .". [".$p . "] | ASIGNADO A: ".$f['paterno'] . " ".$f['materno'] . " ".$f['nombres'];

                $listaDep[] = $listaDepAux;
            }




            $utilRepo = new UtilsRepository($this->getEntityManager());

            $sqlQuery = "SELECT id_parametricas,codigo, descripcion
                          FROM f_parametricas
                          WHERE id_maestro in (SELECT id_parametricas
                                                FROM f_parametricas
                                                WHERE descripcion = 'normas_generales')
                          ORDER BY codigo";
            $normativasGenerales = $utilRepo->execNativeSql($sqlQuery);

            $sqlQuery = "SELECT id_parametricas,codigo,descripcion
                          FROM f_parametricas
                          WHERE id_maestro  in (SELECT id_parametricas
                                                  FROM f_parametricas
                                                  WHERE descripcion = 'normas_especificas')
                          ORDER BY codigo";
            $normativasEspecificas = $utilRepo->execNativeSql($sqlQuery);

            //Datos del Puesto
            $sql = "select
                          p.id_persona,
                          p.item as nro_item,
                          p.cargo as denominacion_cargo,
                          p.id_escala_nivel,
                          p.escala_nivel as nivel,
                          p.tc_categoria as categoria,
                          p.puesto as denominacion_puesto,
                          p.unidad as dependencia_organizacional,
                          p.id_entidad,
                          p.id_unidad,
                          p.sigla_unidad,
                          u.nivel as nivel_unidad
                    from v_persona p left join v_unidades u on p.id_unidad = u.id_unidad
                    where p.id_entidad = 35
                    and p.id_persona = $idPersona";
            $util = new UtilsRepository($this->getEntityManager());
            $personaData = $util->execNativeSql($sql);
            $personaData = $personaData[0];

            $personaDataAux[0]['nro_item'] = "";
            $personaDataAux[0]['nivel'] = "";
            $personaDataAux[0]['categoria'] = "";
            $personaDataAux[0]['denominacion_cargo'] = "";
            $personaDataAux[0]['denominacion_puesto'] = "";
            $personaDataAux[0]['dependencia_organizacional'] = "";

            $personaDataAux[0] = $personaData;

            $sql = "SELECT fpu.*
                    FROM f_puesto fpu left join f_poai fp ON fpu.id_poai = fp.id_poai
                    WHERE fpu.id_poai = $idPoai
                    AND fp.id_gp = $idGp
                    AND fp.id_persona = $idPersona";
            $util = new UtilsRepository($this->getEntityManager());
            $puestoPoai = $util->execNativeSql($sql);
            $puestoPoai = count($puestoPoai)>0? $puestoPoai[0] : $personaDataAux[0];
//Debug::dump($personaData);


            //Relaciones del puesto
            $relacionPoaiLista = array();
            if($idPoai != 0){
                $sql = "SELECT fr.*
                        FROM f_relaciones fr left join f_poai fp ON fr.id_poai = fp.id_poai
                        WHERE  fp.id_poai = $idPoai
                        AND fp.id_gp = $idGp
                        AND fp.id_persona = $idPersona
                        AND fr.estado = true
                        AND fp.estado = true";
                $util = new UtilsRepository($this->getEntityManager());
                $relacionPoai = $util->execNativeSql($sql);
                $relacionPoaiLista = count($relacionPoai)>0? $relacionPoai : array();
            }

            $listaRelacionPuestoDepende = array();
            $listaRelacionPuestoSupervisa = array();

            $puesto = "";
            $puestoAux2 = "";

            //Debug::dump($listadoDependientes);

            foreach($listadoDependientes as $f){
                //echo $f['id_escala_nivel'] ." < ". $personaData['id_escala_nivel']."<br>";
                if($f['id_escala_nivel'] < $personaData['id_escala_nivel']
                    && $f['puesto'] != $puesto && $f['puesto'] != ""
                ){
                    //$listaRelacionPuestoDepende[$f['id_escala_nivel']] = $f['puesto'];

                    $listaRelacionPuestoAux = array();
                    $listaRelacionPuestoAux['id_escala_nivel'] = $f['id_escala_nivel'];
                    $listaRelacionPuestoAux['cargo'] = $f['cargo'];
                    $listaRelacionPuestoAux['puesto'] = "[".$f['cargo']."] ".$f['puesto'];

                    $listaRelacionPuestoAux['selected'] = '';
                    //if(isset($relacionPoai) && $idPoai != 0 && $relacionPoai['descripcion'] == $f['puesto'])

                    $puesto = $f['puesto'];

                    //Debug::dump($listaRelacionPuestoAux);

                    foreach($relacionPoaiLista as $relacionPoai) {

                        if ($idPoai != 0 && $relacionPoai['id_poai'] == $idPoai
                                && $relacionPoai['id_relaciones_p'] == 6
                                && trim($relacionPoai['descripcion']) == trim($listaRelacionPuestoAux['puesto'])
                        ) {
                            $listaRelacionPuestoAux['selected'] = 'selected';
                        }
                    }

                    $listaRelacionPuestoDepende[] = $listaRelacionPuestoAux;
                }

                if($f['id_escala_nivel'] > $personaData['id_escala_nivel']
                    && $f['puesto'] != $puestoAux2 && $f['puesto'] != ""
                ){
                    //$listaRelacionPuestoDepende[$f['id_escala_nivel']] = $f['puesto'];

                    $listaRelacionPuestoAux = array();
                    $listaRelacionPuestoAux['id_escala_nivel'] = $f['id_escala_nivel'];
                    $listaRelacionPuestoAux['cargo'] = $f['cargo'];
                    $listaRelacionPuestoAux['id_puesto'] = $f['id_puesto'];
                    $listaRelacionPuestoAux['puesto'] = "[".$f['cargo']."] ".$f['puesto'];;

                    $listaRelacionPuestoAux['selected'] = '';
                    //if(isset($relacionPoai) && $idPoai != 0 && $relacionPoai['descripcion'] == $f['puesto'])

                    $puestoAux2 = $f['puesto'];

                    foreach($relacionPoaiLista as $relacionPoai) {
                        if ($idPoai != 0 && $relacionPoai['id_poai'] == $idPoai  && $relacionPoai['id_relaciones_p'] == 11) {
                            //$listaRelacionPuestoAux['selected'] = 'selected';
                        }
                    }

                    $listaRelacionPuestoSupervisa[] = $listaRelacionPuestoAux;
                }

            }

//Debug::dump($listaRelacionPuestoSupervisa);

            /* $sqlQuery = "SELECT *
                           FROM f_normas
                           WHERE id_poai = $idPoai
                           and  id_gp = $idGp
                           AND estado = true";*/
            $sqlQuery = "SELECT fn.*
                            FROM f_normas fn left join f_poai fp ON fn.id_poai = fp.id_poai
                            WHERE  fp.id_poai = $idPoai
                            AND fp.id_gp = $idGp
                            AND fp.id_persona = $idPersona
                            AND fn.estado = true";

            $normativasValores = $utilRepo->execNativeSql($sqlQuery);

            //Objetivo puesto
            $sqlQuery = "SELECT fo.*
                            FROM f_objetivos fo
                            WHERE  fo.id_poai = $idPoai
                            AND fo.estado = true";
            $objetivoPuesto = $utilRepo->execNativeSql($sqlQuery);
            $objetivoPuesto = count($objetivoPuesto)>0? $objetivoPuesto[0] : array('objetivo_a'=>'','objetivo_b'=>'','objetivo_c'=>'',);


            $sqlQuery = "SELECT id_parametricas,codigo,descripcion
                          FROM f_parametricas
                          WHERE id_maestro  in (SELECT id_parametricas
                                                  FROM f_parametricas
                                                  WHERE descripcion = 'competencias')
                          ORDER BY codigo";
            $listaCompetencias = $utilRepo->execNativeSql($sqlQuery);

            $sqlQuery = "SELECT * FROM f_competencias WHERE id_poai = $idPoai";
            $listaCompetenciasSeleccionadas = $utilRepo->execNativeSql($sqlQuery);

            //Debug::dump($res);
            $viewModel = new ViewModel(array(
                'normativasGenerales' => $normativasGenerales,
                'normativasEspecificas' => $normativasEspecificas,
                'normativasValores' => $normativasValores,
                'listaDependientes' => $listaDep,
                'puestoPoai' => $puestoPoai,
                'idPersona' => $idPersona,
                'idGp' => $idGp,
                'idUnidad' => $idUnidad,
                'idPoai' => $idPoai,
                'listaRelacionPuestoDepende' => $listaRelacionPuestoDepende,
                'listaRelacionPuestoSupervisa' => $listaRelacionPuestoSupervisa,
                'objetivoPuesto' => $objetivoPuesto,
                'listaCompetencias' => $listaCompetencias,
                'listaCompetenciasSeleccionadas' => $listaCompetenciasSeleccionadas,
                )
            );

            $widgetItemsSupervisa = $this->forward()->dispatch('Formulacion\Controller\Index',
                                                     array(
                                                         'action' => 'lista-items-supervisa',
                                                         'id' => 0,
                                                         'id2' => $idGp,
                                                         'id3' => $idPoai,
                                                     ));
            $widgetFuncionesGenerales = $this->forward()->dispatch('Formulacion\Controller\Index',
                                                     array(
                                                         'action' => 'lista-funciones-generales',
                                                         'id' => 0,
                                                         'id2' => $idGp,
                                                         'id3' => $idPoai,
                                                     ));
            $widgetFuncionesEspecificas = $this->forward()->dispatch('Formulacion\Controller\Index',
                                                     array(
                                                         'action' => 'lista-funciones-especificas',
                                                         'id' => 0,
                                                         'id2' => $idGp,
                                                         'id3' => $idPoai,
                                                     ));

            $viewModel->addChild($widgetItemsSupervisa ,'widgetItemsSupervisa');
            $viewModel->addChild($widgetFuncionesGenerales ,'widgetFuncionesGenerales');
            $viewModel->addChild($widgetFuncionesEspecificas ,'widgetFuncionesEspecificas');

            return $viewModel;

        }

        public function poaiguardarAction(){

            //$request = $this->getRequest();
            //$viewmodel = new ViewModel();
            //$viewmodel->setTerminal($request->isXmlHttpRequest());


            if ($this->request->isPost()) {
                $post = $this->request->getPost()->toArray();

               // Debug::dump($post['puesto']);
               // Debug::dump($post['relacion']);

                $respuesta = array (
                    "respuesta" => true,
                    "mensaje" => "DATOS VALIDOS.",
                );
                echo Json::encode($respuesta);
                exit;
            }

            /*
            $respuesta = array (
                "respuesta" => false,
                "mensaje" => "FORMULARIO NO VALIDO.",
            );
            echo Json::encode($respuesta);
            exit;
*/


        }

        public function unoAction(){ //exit();
           // $request = $this->getRequest();
           // $viewmodel = new ViewModel();
           // $viewmodel->setTerminal(true);
           // return $viewmodel;
        }
        public function dosAction(){
           // $request = $this->getRequest();
        }
        public function tresAction(){
           // $request = $this->getRequest();
        }
        public function confirmarAction(){
           // $request = $this->getRequest();
        }

        public function listaItemsSupervisaAction(){

            $request = $this->getRequest ();
            $viewmodel = new ViewModel ();
            $viewmodel->setTerminal ( $request->isXmlHttpRequest () );

            $tipoRender =      $this->params ()->fromRoute ( 'id', $this->params ()->fromQuery ( 'id', '0' ) );
            $idGp =      $this->params ()->fromRoute ( 'id2', $this->params ()->fromQuery ( 'id2', '0' ) );
            $idPoai =    $this->params ()->fromRoute ( 'id3', $this->params ()->fromQuery ( 'id3', '0' ) );
            //$estado =  $this->params ()->fromRoute ( 'p_3', $this->params ()->fromQuery ( 'p_3', '0' ) );


            $sqlQuery = "SELECT fs.*
                            FROM f_supervisa fs left join f_poai fp ON fs.id_poai = fp.id_poai
                            WHERE  fp.id_poai = $idPoai
                            AND fp.id_gp = $idGp
                            AND fs.estado = '1'
                            ";
            $utilRepo = new UtilsRepository($this->getEntityManager());
            $listaItemsSupervisa = $utilRepo->execNativeSql($sqlQuery);

            $this->listaItemsSupervisaLocal = $listaItemsSupervisa;

            /*$listaItemsSupervisa = array(
                array('id_poai'=>'1','id_puesto'=>'139','descripcion'=>'ANALISTA DE CONTABILIDAD','cantidad'=>4),
                array('id_poai'=>'1','id_puesto'=>'2684','descripcion'=>'TECNICO VERIFICADOR','cantidad'=>1)
            );*/

            //DatosSesion::debugIntoFirebug($id.'-'.$tipo.'-'.$estado);

            //$ActivosRepository = new InexistenciasRepository($this->getEntityManager());
            //$ActivosArray = $ActivosRepository->GetDetailsInexistencia($id);

            //Debug::dump($ActivosArray);

            if ($tipoRender == 0){

                return array('listaItemsSupervisa' => $listaItemsSupervisa,
                             'idGp' => $idGp,
                             'idPoai' => $idPoai,
                );
            }else
            {
                $viewmodel = new ViewModel (array('listaItemsSupervisa' => $listaItemsSupervisa,
                                                  'idGp' => $idGp,
                                                  'idPoai' => $idPoai,
                                            ));
                return $viewmodel;
            }


        }

        public function listaFuncionesGeneralesAction(){

            $request = $this->getRequest ();
            $viewmodel = new ViewModel ();
            $viewmodel->setTerminal ( $request->isXmlHttpRequest () );

            $tipoRender =      $this->params ()->fromRoute ( 'id', $this->params ()->fromQuery ( 'id', '0' ) );
            $idGp =      $this->params ()->fromRoute ( 'id2', $this->params ()->fromQuery ( 'id2', '0' ) );
            $idPoai =    $this->params ()->fromRoute ( 'id3', $this->params ()->fromQuery ( 'id3', '0' ) );
            //$estado =  $this->params ()->fromRoute ( 'p_3', $this->params ()->fromQuery ( 'p_3', '0' ) );


            $sqlQuery = "SELECT
                            *
                        FROM f_funciones
                        WHERE id_poai = $idPoai
                        AND id_funciones_p = 12
                        AND estado = '1'";
            $utilRepo = new UtilsRepository($this->getEntityManager());
            $listaItemsSupervisa = $utilRepo->execNativeSql($sqlQuery);

           // $this->listaItemsSupervisaLocal = $listaItemsSupervisa;

            /*$listaItemsSupervisa = array(
                array('id_poai'=>'1','id_puesto'=>'139','descripcion'=>'ANALISTA DE CONTABILIDAD','cantidad'=>4),
                array('id_poai'=>'1','id_puesto'=>'2684','descripcion'=>'TECNICO VERIFICADOR','cantidad'=>1)
            );*/

            //DatosSesion::debugIntoFirebug($id.'-'.$tipo.'-'.$estado);

            //$ActivosRepository = new InexistenciasRepository($this->getEntityManager());
            //$ActivosArray = $ActivosRepository->GetDetailsInexistencia($id);

            //Debug::dump($ActivosArray);

            if ($tipoRender == 0){

                return array('listaItemsSupervisa' => $listaItemsSupervisa,
                             'idGp' => $idGp,
                             'idPoai' => $idPoai,
                );
            }else
            {
                $viewmodel = new ViewModel (array('listaItemsSupervisa' => $listaItemsSupervisa,
                                                  'idGp' => $idGp,
                                                  'idPoai' => $idPoai,
                                            ));
                return $viewmodel;
            }


        }
        public function listaFuncionesEspecificasAction(){

            $request = $this->getRequest ();
            $viewmodel = new ViewModel ();
            $viewmodel->setTerminal ( $request->isXmlHttpRequest () );

            $tipoRender =      $this->params ()->fromRoute ( 'id', $this->params ()->fromQuery ( 'id', '0' ) );
            $idGp =      $this->params ()->fromRoute ( 'id2', $this->params ()->fromQuery ( 'id2', '0' ) );
            $idPoai =    $this->params ()->fromRoute ( 'id3', $this->params ()->fromQuery ( 'id3', '0' ) );
            //$estado =  $this->params ()->fromRoute ( 'p_3', $this->params ()->fromQuery ( 'p_3', '0' ) );


            $sqlQuery = "SELECT
                            *
                        FROM f_funciones
                        WHERE id_poai = $idPoai
                        AND id_funciones_p = 13
                        AND estado = '1'";
            $utilRepo = new UtilsRepository($this->getEntityManager());
            $listaItemsSupervisa = $utilRepo->execNativeSql($sqlQuery);

           // $this->listaItemsSupervisaLocal = $listaItemsSupervisa;

            /*$listaItemsSupervisa = array(
                array('id_poai'=>'1','id_puesto'=>'139','descripcion'=>'ANALISTA DE CONTABILIDAD','cantidad'=>4),
                array('id_poai'=>'1','id_puesto'=>'2684','descripcion'=>'TECNICO VERIFICADOR','cantidad'=>1)
            );*/

            //DatosSesion::debugIntoFirebug($id.'-'.$tipo.'-'.$estado);

            //$ActivosRepository = new InexistenciasRepository($this->getEntityManager());
            //$ActivosArray = $ActivosRepository->GetDetailsInexistencia($id);

            //Debug::dump($ActivosArray);

            if ($tipoRender == 0){

                return array('listaItemsSupervisa' => $listaItemsSupervisa,
                             'idGp' => $idGp,
                             'idPoai' => $idPoai,
                );
            }else
            {
                $viewmodel = new ViewModel (array('listaItemsSupervisa' => $listaItemsSupervisa,
                                                  'idGp' => $idGp,
                                                  'idPoai' => $idPoai,
                                            ));
                return $viewmodel;
            }


        }

        public function saveDetalleDependeAction(){
            $idGp =  $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
            $idPoai = $this->params()->fromRoute('id2',$this->params()->fromQuery('id2','0'));
            $idPuesto = $this->params()->fromRoute('id3',$this->params()->fromQuery('id3','0'));


            //Relaciones del puesto
            $relacionPoaiLista = array();
            if($idPoai != 0){
                $sql = "SELECT fr.*
                        FROM f_relaciones fr left join f_poai fp ON fr.id_poai = fp.id_poai
                        WHERE  fp.id_poai = $idPoai
                        AND fp.id_gp = $idGp
                        AND fr.estado = true
                        AND fr.id_relaciones_p = 6
                        AND fp.estado = true";
                $util = new UtilsRepository($this->getEntityManager());
                $relacionPoai = $util->execNativeSql($sql);
                $relacionPoaiLista = count($relacionPoai)>0? $relacionPoai[0] : false;
            }

            if($relacionPoaiLista){
                $sqlQuery = "UPDATE
                                f_relaciones
                            SET
                                descripcion = '$idPuesto'
                            WHERE
                                id_relacion = ".$relacionPoaiLista['id_relacion'];


                $utilRepo = new UtilsRepository($this->getEntityManager());
                $listaItemsSupervisa = $utilRepo->execNativeSql($sqlQuery);
            }else{
                //$SaveDataRepository = new InexistenciasRepository($this->getEntityManager());
                //$respuesta = $SaveDataRepository->saveDataDetalle($id,$actid,$cantidad,$descripcion,$detid);

                $sqlQuery = "INSERT
                                INTO
                                    f_relaciones
                                    (
                                        id_relacion,
                                        descripcion,
                                        estado,
                                        id_poai,
                                        id_relaciones_p
                                    )
                                    VALUES
                                    (
                                        (SELECT  max(id_relacion)+1  FROM f_relaciones),
                                        '$idPuesto',
                                        '1',
                                        $idPoai,
                                        6
                                    );

                            ";
                $utilRepo = new UtilsRepository($this->getEntityManager());
                $listaItemsSupervisa = $utilRepo->execNativeSql($sqlQuery);

            }

            $respuesta = array (
                "respuesta" => true,
                "mensaje" => "SE REGISTRARON CORRECTAMENTE LOS DATOS."
            );

            echo Json::encode($respuesta);
            exit();

        }

        public function saveDetalleSupervisaAction(){
            $idGp =  $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
            $idPoai = $this->params()->fromRoute('id2',$this->params()->fromQuery('id2','0'));
            $supervisa = $this->params()->fromRoute('id3',$this->params()->fromQuery('id3','0'));
            $cantidad = $this->params()->fromRoute('id4',$this->params()->fromQuery('id4','0'));
            $idPuesto = $this->params()->fromRoute('id5',$this->params()->fromQuery('id5','0'));



            $sqlQuery = "SELECT fs.*
                            FROM f_supervisa fs left join f_poai fp ON fs.id_poai = fp.id_poai
                            WHERE  fp.id_poai = $idPoai
                            AND fp.id_gp = $idGp
                            AND fs.estado = '1'
                            ";
            $utilRepo = new UtilsRepository($this->getEntityManager());
            $listaItemsSupervisa = $utilRepo->execNativeSql($sqlQuery);
            $this->listaItemsSupervisaLocal = $listaItemsSupervisa;
            // Debug::dump($this->listaItemsSupervisaLocal);

            $resultado = false;
            foreach ($this->listaItemsSupervisaLocal as $itemsSupervisa){
                if($idPoai == $itemsSupervisa['id_poai'] && $idPuesto == $itemsSupervisa['id_puesto'] ){
                    $resultado = true;
                }
            }

            if($resultado == true){
                $respuesta = array (
                    "respuesta" => false,
                    "mensaje" => "Ya eligio el item, seleccione otro."
                );

                echo Json::encode($respuesta);
                exit();
            }



            if (isset($idGp) && $idGp != 0){
                //$SaveDataRepository = new InexistenciasRepository($this->getEntityManager());
                //$respuesta = $SaveDataRepository->saveDataDetalle($id,$actid,$cantidad,$descripcion,$detid);

                $sqlQuery = "INSERT
                                INTO
                                    f_supervisa
                                    (
                                        descripcion,
                                        id_poai,
                                        cantidad,
                                        id_puesto
                                    )
                                    VALUES
                                    (
                                        '$supervisa',
                                        $idPoai,
                                        $cantidad,
                                        $idPuesto
                                    );

                            ";
                $utilRepo = new UtilsRepository($this->getEntityManager());
                $listaItemsSupervisa = $utilRepo->execNativeSql($sqlQuery);

            }

            $respuesta = array (
                "respuesta" => true,
                "mensaje" => "SE REGISTRARON CORRECTAMENTE LOS DATOS."
            );

            echo Json::encode($respuesta);
            exit();

        }


        public function eliminaDetalleSupervisaAction(){
            $idGp =  $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
            $idPoai = $this->params()->fromRoute('id2',$this->params()->fromQuery('id2','0'));
            $idPuesto = $this->params()->fromRoute('id3',$this->params()->fromQuery('id3','0'));
            $idSupervision = $this->params()->fromRoute('id4',$this->params()->fromQuery('id4','0'));

            if (isset($idGp) && $idGp != 0){
                //$SaveDataRepository = new InexistenciasRepository($this->getEntityManager());
                //$respuesta = $SaveDataRepository->saveDataDetalle($id,$actid,$cantidad,$descripcion,$detid);

                $sqlQuery = "UPDATE
                                f_supervisa
                            SET
                                estado = '0'
                            WHERE
                                id_supervisa = $idSupervision;

                            ";
                $utilRepo = new UtilsRepository($this->getEntityManager());
                $listaItemsSupervisa = $utilRepo->execNativeSql($sqlQuery);
            }

            $respuesta = array (
                "respuesta" => true,
                "mensaje" => "SE ELIMINO CORRECTAMENTE EL ITEM."
            );

            echo Json::encode($respuesta);
            exit();

        }

    }