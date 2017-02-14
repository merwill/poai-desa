<?php
/**
 * MINISTERIO DE ECONOMIA Y FINANZAS PUBLICAS
 * UNIDAD DE TECNOLOGIAS DE INFORMACION
 * SISTEMA INTEGRADO POA PRESUPUESTO
 * AUTORES: XIMENA SOTO / WILMER ALVAREZ
 * FECHA: /2014
 */

namespace AuthDoctrine;

use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
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

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Zend\Authentication\AuthenticationService' => function($serviceManager) {
                    return $serviceManager->get('doctrine.authenticationservice.orm_default');
                },
                // SMTP transport - para envio de correo
                'mail.transport' => function (ServiceManager $serviceManager) {
                    $config = $serviceManager->get('Config');
                    $transport = new Smtp();
                    $transport->setOptions(new SmtpOptions($config['mail']['transport']['options']));
                    return $transport;
                },
            )
        );
    }
}	