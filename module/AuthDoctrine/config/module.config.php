<?php
/**
 * MINISTERIO DE ECONOMIA Y FINANZAS PUBLICAS
 * UNIDAD DE TECNOLOGIAS DE INFORMACION
 * SISTEMA INTEGRADO POA PRESUPUESTO
 * AUTORES: XIMENA SOTO / WILMER ALVAREZ
 * FECHA: /2014
 */

namespace AuthDoctrine;

return array(
	'controllers' => array(
        'invokables' => array(
            'AuthDoctrine\Controller\Index' => 'AuthDoctrine\Controller\IndexController',
            'AuthDoctrine\Controller\Registration' => 'AuthDoctrine\Controller\RegistrationController',
            'AuthDoctrine\Controller\Admin' => 'AuthDoctrine\Controller\AdminController',			
        ),
    ),	
    'router' => array(
        'routes' => array(
			'auth-doctrine' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/seguridad', //'/auth-doctrine',
					'defaults' => array(
						'__NAMESPACE__' => 'AuthDoctrine\Controller',
						'controller'    => 'Index',
						'action'        => 'index',
					),
				),
				'may_terminate' => true,
				'child_routes' => array(
					'default' => array(
						'type'    => 'Segment',
						'options' => array(
							'route'    => '/[:controller[/:action[/:id]]]',
							'constraints' => array(
								'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
								'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
							),
							'defaults' => array(
								'__NAMESPACE__' => 'AuthDoctrine\Controller',
								'controller'    => 'Index',
								'action'        => 'index',
							),
						),
					),
					'login' => array(
							'type'    => 'Segment',
							'options' => array(
									'route'    => '/login',
									'constraints' => array(
											'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
											'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
									),
									'defaults' => array(
										'__NAMESPACE__' => 'AuthDoctrine\Controller',
										'controller'    => 'Index',
										'action'        => 'login',
									),
							),
					),
					'logout' => array(
							'type'    => 'Segment',
							'options' => array(
									'route'    => '/logout',
									'constraints' => array(
											'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
											'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
									),
									'defaults' => array(
											'__NAMESPACE__' => 'AuthDoctrine\Controller',
											'controller'    => 'Index',
											'action'        => 'logout',
									),
							),
					),
				),
			),
		),
	),
    'view_manager' => array(
		'template_map' => array(
				'layout/layout-login'           => __DIR__ . '/../view/layout/layout-login.phtml',
		),
        'template_path_stack' => array(
            'auth-doctrine' => __DIR__ . '/../view'
        ),
		
		'display_exceptions' => true,
    ),
	
    'doctrine' => array(
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'AuthDoctrine\Entity\Usuario',
                'identity_property' => 'usrName',
                'credential_property' => 'usrPassword',
                'credential_callable' => function(\AuthDoctrine\Entity\Usuario $user, $passwordGiven) {
					//if ($user->getUsrPassword() == md5('aFGQ475SDsdfsaf2342' . $passwordGiven . $user->getUsrPasswordSalt()) &&
					//if ($user->getUsrPassword() == md5($passwordGiven) && $user->getUsrActive() == 1) {
                    if (true){
						return true;
					}
					else {
						return false;
					}
                },
            ),
        ),

        'driver' => array(
			__NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
					__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
					__NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                )
            )
        )
    ),
);