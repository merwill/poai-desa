<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $event)
    {
        $eventManager        = $event->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        //Init Menu Navigation
        $viewModel = $event->getApplication()->getMvcEvent()->getViewModel();
        $viewModel->parametricas = $this->initNavigation($event);

        // Eventos PreDistpach
        $eventManager->getSharedManager()->attach('Zend\Mvc\Controller\AbstractController',
        		MvcEvent::EVENT_DISPATCH,
        		function(MvcEvent $event){
        
        			//Render Ajax into view
        			$result = $event->getResult();
        			if ($result instanceof \Zend\View\Model\ViewModel) {
        				$result->setTerminal($event->getRequest()->isXmlHttpRequest());
        			}
        
        		});
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function initNavigation($event)
    {
        /*
        $serviceManager = $event->getApplication()->getServiceManager();
        $em = $serviceManager->get('doctrine.entitymanager.orm_default');
        $menu = $em->getRepository('Application\Entity\CoreTablasParametricas')->findAll();

        return $menu;*/

        return array();
    }
}
