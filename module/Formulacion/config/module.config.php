<?php
//namespace Formulacion;
return array(
    'controllers' => array(
        'invokables' => array(
            'Formulacion\Controller\Index' => 'Formulacion\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'formulacion' => array(
                'type' => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route' => '/formulacion',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Formulacion\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(

                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action[/:id[/:id2[/:id3[/:id4]]]]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(),
                        ),
                    ),

                    // You can place additional routes that match
                    // under theroute defined above here.
                    // specific routes.

/*                        'crud'=>array(
                         'type'=>'Segment',
                            'options'=>array(
                                'route' => '/crud[/[:action][/:id]]',
                                'constraints' => array(
                                        'action'  =>  '[a-zA-Z][a-zA-Z0-9_-]*',
                                ),
                                'defaults'  =>  array(
                                '__NAMESPACE__' => 'Formulacion/Controller',
                                 'controller' => 'Crud',
                                 'action'     => 'index'

                                ),
                            ),
                        ),*/

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
            'Formulacion' => __DIR__ . '/../view',
        ),
    ),
);
