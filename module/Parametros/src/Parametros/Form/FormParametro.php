<?php

namespace Parametros\Form;

use Zend\InputFilter;
use Zend\Form\Form;
use Zend\Form\Element;

class FormParametro extends Form
{
	public function __construct ($formName = null , $bdid = null ){
   		
   		if(is_null($formName)){
   			return;
   		}

        parent::__construct($formName);

        //$this->em = $options['em'];
        //$useFilter = $options['use_filter'];
      
        
        $this->setAttribute('id', $formName);
        $this->setAttribute('method', 'post');
        //$this->setAttribute("role", "form");
        $this->setAttribute("class", "form-horizontal");
        //$this->setAttribute("autocomplete", "on");
        $this->setAttribute("name",$formName);
        
        
        
        $this->add(array(
        		'name' => 'idParametro',
        		'type' => 'Zend\Form\Element\Hidden',
        		'attributes' => array(
        				'id' => 'idParametro',
        				'value' => $bdid,
        				'for', 'idParametro',
        		),
        		'options' => array(
        		),
        ));


		$this->add(array(
						   'name' => 'idPadreParametro',
						   'type' => 'Zend\Form\Element\Text',
						   'attributes' => array(
								   'id' => 'idPadreParametro',
								   'placeholder' => 'Padre',
								   'class' => 'form-control input-sm',
								   'style' => 'font-size: 12px;',
						   ),
						   'options' => array(
								   'label' => 'Padre:',
						   ),
				   ));

        $this->add(array(
        		'name' => 'sigla',
        		'type' => 'Zend\Form\Element\Text',
        		'attributes' => array(
        				'id' => 'sigla',
        				'placeholder' => 'sigla',
        				'class' => 'form-control input-sm',
        				'style' => 'font-size: 12px;',
        		),
        		'options' => array(
        				'label' => 'sigla:',
        		),
        ));
        
        
       $this->add(array(
       		'name' => 'descripcion',
       		'type' => 'Zend\Form\Element\Text',
       		'attributes' => array(
       				'id' => 'descripcion',
       				'placeholder' => 'Descripción',
       				'class' => 'form-control input-sm',
       				'style' => 'font-size: 12px;'
       		),
       		'options' => array(
       				'label' => 'Descripción:',
       		),
       ));
       

       
       $this->add(array(
       		'name' => 'orden',
       		'type' => 'Zend\Form\Element\Text',
       		'attributes' => array(
       				'id' => 'orden',
       				'placeholder' => 'orden',
       				'class' => 'form-control input-sm',
       				'style' => 'font-size: 12px;'
       		),
       		'options' => array(
       				'label' => 'Orden:',
       		),
       ));
       
       $this->add(array(
       		'name' => 'nivel',
       		'type' => 'Zend\Form\Element\Text',
       		'attributes' => array(
       				'id' => 'nivel',
       				'placeholder' => 'nivel',
       				'class' => 'form-control input-sm',
       				'style' => 'font-size: 12px;'
       		),
       		'options' => array(
       				'label' => 'nivel:',
       		),
       ));
       

       $this->add(array(
       		'name' => 'estado',
       		'type' => 'Zend\Form\Element\Select',
       		'attributes' => array(
       				'id' => 'estado',
       				'placeholder' => 'estado...',
       				'class' => 'form-control input-sm',
       				'style' => 'font-size: 12px;',
       		),
       		'options' => array(
       				'label' => 'estado:',
       				'value_options' => array(1=> "Vigente",0=> "No Vigente"),
       		),
       ));

		$this->add(array(
						   'name' => 'archivo_adjunto',
						   'type' => 'Zend\Form\Element\File',
						   'attributes' => array(
								   'id' => 'archivo_adjunto',
								   'placeholder' => 'Adjuntar Archivo',
								   'style' => 'font-size: 12px;'
						   ),
						   'options' => array(
								   'label' => 'Adjuntar Archivo:',
								   'style' => 'font-size: 12px;'
						   ),
				   ));
       
       
        $this->add(array(
        		'name' => 'Registrar',
        		'attributes' => array(
        				'type' => 'submit',
        				'id' => 'Registrar',
        				'value' => $bdid=='0'?'Registrar':'Actualizar',
        				'title' => 'Actualizar',
        				'class' => 'btn btn-xs green',
        		),
        ));
        

        
    }
   

}