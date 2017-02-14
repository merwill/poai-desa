<?php
namespace AuthDoctrine\Form;

use DoctrineModule\Validator\ObjectExists;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use \Zend\Validator\Hostname;
use Zend\Validator\EmailAddress;
use Zend\Validator\NotEmpty;

class ForgottenPasswordFilter extends InputFilter
{
	public function __construct($sm)
	{

		$this->add(array(
			'name'       => 'usrEmail',
			'required'   => true,
			'validators' => array(
				array(
					'name' => 'EmailAddress',
					'options' => array(
						'messages' => array(
							EmailAddress::INVALID_FORMAT=> 'La entrada no es una dirección válida de correo electrónico. Utilice el formato básico correo@dominio',
							EmailAddress::INVALID_HOSTNAME=> "'%hostname%' no es un nombre de host válido para la dirección de correo electrónico",

						),
					),
				),
				/*array(
					'name' => 'Hostname',
					'options' => array(
						'messages' => array(
							Hostname::LOCAL_NAME_NOT_ALLOWED => "La entrada parece ser un nombre de red local, pero los nombres de red locales no están permitidos",
							Hostname::INVALID_LOCAL_NAME=> "La entrada no parece ser un nombre de red local válida",
							Hostname::UNKNOWN_TLD=> "La entrada parece ser un nombre de host DNS pero no puede coincidir con la lista conocida TLD",
						),
					),
				),*/
				array(
					'name' => 'NotEmpty',
					'options' => array(
						'messages' => array(
							NotEmpty::IS_EMPTY => "Se requiere valor y no puede estar vacío",
						),
					),
				),
				array(
					'name'		=> 'DoctrineModule\Validator\ObjectExists',
					'options' => array(
						'object_repository' => $sm->get('doctrine.entitymanager.orm_default')->getRepository('AuthDoctrine\Entity\Usuario'),
						'fields'            => 'usrEmail',
						'messages' => array(
							ObjectExists::ERROR_NO_OBJECT_FOUND => "No se ha encontrado ningún objeto coincidente con '%value%'"
						),
					),
				),
			),
		));

        /*$this->add(array(
            'name'       => 'usrEmail',
            'required'   => true,
            'validators' => array(
                array(
                    'name' => 'EmailAddress'
                ),
				array(
					'name'		=> 'DoctrineModule\Validator\ObjectExists',
					'options' => array(
						'object_repository' => $sm->get('doctrine.entitymanager.orm_default')->getRepository('AuthDoctrine\Entity\Usuario'),
						'fields'            => 'usrEmail',
						'messages' => array(
							ObjectExists::ERROR_NO_OBJECT_FOUND => "No se ha encontrado ningún objeto coincidente con '%value%'"
						),
					),
				),
            ),
        ));	*/
	}
}