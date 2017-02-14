<?php
namespace AuthDoctrine\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class CambiarPasswordForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('registration');
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        $this->setAttribute('onsubmit', 'if(!confirm("Seguro de guardar?")){return false;}');


        $this->add(array(
            'name' => 'usrName',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'form-control',
                'required' => 'required',
                'placeholder' => 'Ingrese Usuario...',
                'for' => 'Usuario',
            ),
            'options' => array(
                'label' => 'Usuario',
            ),
        ));

        $this->add(array(
            'name' => 'usrEmail',
            'attributes' => array(
                'type'  => 'email',
                'class' => 'form-control',
               // 'required' => 'required',
                'placeholder' => 'Ingrese Correo...',
                'for' => 'Correo',
            ),
            'options' => array(
                'label' => 'Correo',
            ),
        ));

        $this->add(array(
            'name' => 'usrPasswordOld',
            'attributes' => array(
                'type'  => 'password',
                'required' => 'required',
                'class' => 'form-control',
                'placeholder' => 'Ingrese su clave...',
            ),
            'options' => array(
                'label' => 'Clave Actual',
            ),
        ));

		$this->add(array(
            'name' => 'usrPassword',
            'attributes' => array(
                'type'  => 'password',
                'required' => 'required',
                'class' => 'form-control',
                'placeholder' => 'Ingrese nueva clave...',
            ),
            'options' => array(
                'label' => 'Clave Nueva',
            ),
        ));

        $this->add(array(
            'name' => 'usrPasswordConfirm',
            'attributes' => array(
                'type'  => 'password',
                'required' => 'required',
                'class' => 'form-control',
                'placeholder' => 'Confirmar nueva clave...',
            ),
            'options' => array(
                'label' => 'Confirmar Clave Nueva:',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'class' => 'btn btn-primary',
                'value' => 'Go',
                'id' => 'submitbutton',
                //'onclick' => 'if(!confirm("Seguro de guardar?")){return false;}',
            ),
        )); 
    }
}