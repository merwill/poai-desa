<?php
namespace Parametros;

return array(
    'controllers' => array(
        'invokables' => array(
            'Parametros\Controller\Index' => 'Parametros\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'parametros' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/parametros',
                    'defaults' => array(
					'__NAMESPACE__' => 'Parametros/Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                
                'child_routes' => array(
                    // You can place additional routes that match 
                    // under theroute defined above here.
					// specific routes.
                   /* 'crud'=>array(
                         'type'=>'Segment',
                            'options'=>array(
                                'route' => '/crud[/[:action][/:id]]',
                                'constraints' => array(
                                        'action'  =>  '[a-zA-Z][a-zA-Z0-9_-]*',
                                ),
                                'defaults'  =>  array(
                                '__NAMESPACE__' => 'Parametros/Controller',
                                 'controller' => 'Crud',
                                 'action'     => 'index'
                                 
                                ),
                            ),
                        ),*/
					'default' => array(
						'type' => 'Segment',
						'options' => array(
							'route' => '/[:controller[/:action[/:id]]]',
							'constraints' => array(	'controller' =>	'[a-zA-Z][a-zA-Z0-9_-]*',
													'action' =>	'[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
							),
						),
					),
                ), 
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory', // <-- add this
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'parametros' => __DIR__ . '/../view',
        ),
    ),
);
