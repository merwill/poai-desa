<?php

namespace Administracion\Form;

use Zend\InputFilter;
use Zend\Form\Form;
use Zend\Form\Element;

class FormPeriodo extends Form
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
        		'name' => 'id_gp',
        		'type' => 'Zend\Form\Element\Hidden',
        		'attributes' => array(
        				'id' => 'id_gp',
        				'value' => $bdid,
        				'for', 'id_gp',
        		),
        		'options' => array(
        		),
        ));

        $this->add(array(
        		'name' => 'gestion',
        		'type' => 'Zend\Form\Element\Text',
        		'attributes' => array(
        				'id' => 'gestion',
        				'placeholder' => 'gestion',
        				'class' => 'form-control input-sm',
        				'style' => 'font-size: 12px;',
        		),
        		'options' => array(
        				'label' => 'Gestion:',
        		),
        ));
        
        
       $this->add(array(
       		'name' => 'periodo',
       		'type' => 'Zend\Form\Element\Text',
       		'attributes' => array(
       				'id' => 'periodo',
       				'placeholder' => 'periodo',
       				'class' => 'form-control input-sm',
       				'style' => 'font-size: 12px;'
       		),
       		'options' => array(
       				'label' => 'Periodo:',
       		),
       ));

		$this->add(array(
						   'name' => 'descripcion',
						   'type' => 'Zend\Form\Element\Textarea',
						   'attributes' => array(
								   'id' => 'descripcion',
								   'placeholder' => 'Ingrese descripcion',
								   'required' => 'required',
								   'rows' => 2,
								   'cols' => 50,
								   'class' => 'form-control input-sm',
								   //'for', 'Insumo',
						   ),
						   'options' => array(
								   'label' => 'Descripcion:'
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
       				'label' => 'Estado:',
       				'value_options' => array(
							''=> "--Seleccione--",
							'F'=> "FORMULACION",
							'S'=> "SEGUIMIENTO",
							'E'=> "EVALUACION",
							'C'=> "CERRADO",
							),
       		),
       ));

       $this->add(array(
       		'name' => 'vigencia',
       		'type' => 'Zend\Form\Element\Select',
       		'attributes' => array(
       				'id' => 'vigencia',
       				'placeholder' => 'vigencia...',
       				'class' => 'form-control input-sm',
       				'style' => 'font-size: 12px;',
       		),
       		'options' => array(
       				'label' => 'Vigencia:',
       				'value_options' => array(
							'V'=> "VIGENTE",
							'N'=> "SUSPENDIDO",
							),
       		),
       ));

		$this->add(array(
						   'name' => 'fecha_ini',
						   'type' => 'Zend\Form\Element\Text',
						   'attributes' => array(
								   'id' => 'fecha_ini',
								   'placeholder' => 'fecha_ini',
								   'readonly' => 'readonly',
								   //'class' => 'form-control form-control-inline input-sm date-picker',
								   'class' => 'form-control input-sm',
								   'style' => 'font-size: 12px;'
						   ),
						   'options' => array(
								   'label' => 'Fecha Inicial:',
						   ),
				   ));

		$this->add(array(
						   'name' => 'fecha_fin',
						   'type' => 'Zend\Form\Element\Text',
						   'attributes' => array(
								   'id' => 'fecha_fin',
								   'placeholder' => 'fecha_fin',
								   'readonly' => 'readonly',
								   'class' => 'form-control input-sm',
								   'style' => 'font-size: 12px;'
						   ),
						   'options' => array(
								   'label' => 'Fecha Fin:',
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