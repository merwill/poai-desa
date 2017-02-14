<?php
namespace AuthDoctrine\Form;

use Zend\Form\Form;

class ForgottenPasswordForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('registration');
        $this->setAttribute('method', 'post');
        $this->setAttribute('role', 'form');
        $this->setAttribute('class', 'form-horizontal');
        $this->setAttribute('onsubmit', 'if(!confirm("Seguro de enviar?")){return false;}');
		
        $this->add(array(
            'name' => 'usrEmail',
            'attributes' => array(
                'type'  => 'email',
           		'class' => 'form-control',
                'required' => 'required',
                'placeholder' => 'Ingrese su correo electrónico...',
            ),
            'options' => array(
                'label' => 'Ingrese su correo electrónico',
            ),
        ));	
		
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
           		'class' => 'btn btn-primary',
            ),
        )); 
    }
}