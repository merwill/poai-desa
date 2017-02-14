<?php
namespace AuthDoctrine\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('login');
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
       // $this->setAttribute('autocomplete', 'off');
        /*
		$this->add(array(
            'name' => 'usr_id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
		*/
        $this->add(array(
            'name' => 'username', // 'usr_name',
            'attributes' => array(
                'type'  => 'text',
                'id' => 'username',
                'required'  => 'required',
                'class' => 'form-control',
                'placeholder' => 'Ingrese un nombre de USUARIO...',
                'value' => '',
            ),
            'options' => array(
                // 'label' => 'Username',

            ),
        ));
        $this->add(array(
            'name' => 'password', // 'usr_password',
            'attributes' => array(
                'type'  => 'password',
                'id' => 'password',
                'required'  => 'required',
                'class' => 'form-control',
                'placeholder' => 'Ingrese una CLAVE...',
            ),
            'options' => array(
                //'label' => 'Password',
            ),
        ));


        $this->add(array(
            'name' => 'aplicaciones',
            'type' => 'select', // 'Zend\Form\Element\Select',
            'attributes' => array(
                //'type'  => 'select',
                //'required'  => 'required',
                'id' => 'aplicaciones',
                'class' => 'form-control',
                'placeholder' => 'Aplicaciones',
            ),
            'options' => array(
            ),
        ));


        $this->add(array(
            'name' => 'rememberme',
            'type' => 'checkbox', // 'Zend\Form\Element\Checkbox',
//            'attributes' => array(
//                'type'  => '\Zend\Form\Element\Checkbox',
//            ),
            'options' => array(
                'label' => 'Recordarme?',
//				'checked_value' => 'true', without value here will be 1
//				'unchecked_value' => 'false', // witll be 1
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'class' => 'btn btn-primary',
                'value' => 'Iniciar Sesion',
            ),
        ));

        $this->add(array(
            'name' => 'cancelar',
            'attributes' => array(
                'type'  => 'button',
                'class' => 'btn btn-primary',
                'value' => 'Cancelar',
            ),
        ));
    }
}