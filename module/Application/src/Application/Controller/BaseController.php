<?php
/**
 * MINISTERIO DE ECONOMIA Y FINANZAS PUBLICAS
 * UNIDAD DE TECNOLOGIAS DE INFORMACION
 * SISTEMA .....
 * MODULO: Application
 * AUTOR: ...
 * FECHA: ...
 */

namespace Application\Controller;

use Doctrine\ORM\EntityManager;
use MisLibrerias\DbFactory;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Serializer\Serializer;
use Zend\Session\Container;

class BaseController extends AbstractActionController
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        $request = $e->getRouteMatch();
        $controller = $request->getParam("controller");
        $action = $request->getParam("action");

        //Obtencion de Sesion
        $sessionContainer = new Container('datos_sesion');
        $datosSession = $sessionContainer->datos_sesion;
        if (!isset($datosSession)) {
            if ($controller != 'Application\Controller\Base'
                || $action != 'index'
            ) {

            //}else{

                $configIni = new \Zend\Config\Reader\Ini();
                $config = $configIni->fromFile(
                    getcwd() . "/config/config-general.ini"
                );

                //Redireccion Modo Local
                /*return $this->redirect()->toUrl(
                    $config['seguridad']['url_login'] // . "/seguridad/login"
                );*/

                //return $this->redirect()->toRoute('auth-doctrine/login');

                // Redireccion Modo Remoto
                return $this->redirect()->toUrl($config['seguridad']['url_login']);

            }
        }

        return parent::onDispatch($e);

    }

    public function indexAction()
    {
        $request = $this->params()->fromQuery('id', '0');

        $session = new Container('datos_sesion');
        $request = Serializer::unserialize($request);
        $session->datos_sesion = $request;

        $em = $this->getEntityManager();

        return $this->redirect()->toRoute('home');
    }

    /**
     * Para la gestión de las entidades a través Doctrine
     *
     * @param EntityManager $em
     */
    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Para la gestión de las entidades a través Doctrine
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager($database = 'poai')
    {
        if (null === $this->em) {
            //  $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');

            $applicationConfig = $this->getServiceLocator()->get('config');
            $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $emDefaultConfig = $em->getConfiguration();

            $dbFactory = new DbFactory($applicationConfig);
            $anotherConnection = $dbFactory->getConnectionToDatabase($database);
            $anotherEntityManager = $dbFactory->getEntityManager(
                $anotherConnection, $emDefaultConfig
            );

            $this->em = $anotherEntityManager;
        }
        return $this->em;
    }

    public function logoutAction()
    {
        $sessionManager = new \Zend\Session\SessionManager();
        $sessionManager->forgetMe();

        $session = new Container('datos_sesion');
        $session->datos_sesion = null;

        $configIni = new \Zend\Config\Reader\Ini();
        $config = $configIni->fromFile(getcwd() . "/config/config-general.ini");

        return $this->redirect()->toUrl($config['seguridad']['url_logout']);

    }
}