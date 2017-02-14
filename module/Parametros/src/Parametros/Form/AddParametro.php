<?php
namespace Parametros\Form;
 
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\Factory;
use Zend\Form\Element\Select;
 
class AddParametro extends Form
{
    public function __construct($name = null,$lista)
     {  
       parent::__construct($name);
       $this->setAttributes(array(
            //'action' => $this->url.'/modulo/recibirformulario',
            'action'=>"",
            'method' => 'post'
        ));
        $this->add(array(
            'name' => 'parametro',
            'options' => array(
                'label' => 'Parametro: ',
            ),
            'attributes' => array(
                'type' => 'text',
                'id' => 'parametro',
                'class' => 'input form-control',
                'required'=>'required'
            )
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'tipoparametro',
            'options' => array(
                'label' => 'Tipo de Parametro: ',
                'value_options' => $lista,
            ),
            'attributes' => array(
                'id' => 'tipoparametro',
                'value' => '1',
                'class' => 'input form-control',
                'required'=>'required'
            )
        ));
        $this->add(array(
            'name' => 'submit2',
            'attributes' => array(     
                'type' => 'submit',
                'value' => 'Enviar',
                'title' => 'Enviar',
                'class' => 'btn btn-success'
            ),
        ));
     }
}
?>