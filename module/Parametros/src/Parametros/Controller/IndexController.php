<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Parametros\Controller;


use Application\Controller\BaseController;
use Application\Entity\Repositories\BasesRepository;

use Application\Entity\Repositories\ParametrosRepository;

use Doctrine\Common\Collections\Criteria;
use Parametros\Form\FormParametro;
use Zend\Debug\Debug;
use Zend\Json\Json;
use Zend\Validator\File\Size;
use Zend\View\Model\ViewModel;


class IndexController extends BaseController
{

    public function indexAction()
    {

    	$request = $this->getRequest();
    	$viewmodel = new ViewModel();
    	$viewmodel->setTerminal($request->isXmlHttpRequest());

		$em = $this->getEntityManager();

		//$listado = $em->getRepository($claseEntity)->findAll();
		/*$listadoDatos = $em->getRepository('Application\Entity\Parametros')->findBy(array('nivel' => 1),
				array('idParametro' => Criteria::DESC)
		);*/




    	$objectRepository = new ParametrosRepository($this->getEntityManager());
    	$listadoDatos = $objectRepository->getListaDatos();

		//Debug::dump($listadoDatos);

    	$viewmodel = new ViewModel(
    			array(
    			'listadoDatos' => 	$listadoDatos,
    			)
    	);
        return $viewmodel;
    }
    
    
    
    public function nuevoAction(){
    
    	$request = $this->getRequest();
    	$viewmodel = new ViewModel();
    	$viewmodel->setTerminal($request->isXmlHttpRequest());
    
    	$bdid = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
    	//Debug::dump($bdid);

			$basesRepository = new ParametrosRepository($this->getEntityManager());

    	$form = new FormParametro('frmParametro' , $bdid );
    
    	if ($bdid != '0') {
    		 
    		$dato = $basesRepository->getForm($bdid);
    		//Debug::dump($dato);
    		$form -> setData($dato);
    		 
    	}
    
    
    	if (!$this->request->isPost()) {
    		 
    		$viewmodel->setVariables(array(
    				"form"=>$form,
    				"idParametro" => $bdid,
    		));
    		return $viewmodel;
    	}
    
    	$data = $request->getPost()->toArray();
    	unset($data['Registrar']);
    	$form->setData($data);
    	 
    	if($form->isValid()){


			$files = $request->getFiles()->toArray();


    		//$SaveDataRepository = new ParametrosRepository($this->getEntityManager());
    		//$respuesta = $SaveDataRepository->saveData($data, $files);



				//Debug::dump($files);
				//Debug::dump($data);

			//$data['idParametro'] = $respuesta['idParametro'];
			//Debug::dump($data);
    		if (isset($files) && $files['archivo_adjunto']['name'] != ""){
	    		if ($files['archivo_adjunto']['name'] != ""){
		    		$respuesta = $this->adjuntarArchivo($data, $files);
		    	}
    		}else{

				$SaveDataRepository = new ParametrosRepository($this->getEntityManager());
				$respuesta = $SaveDataRepository->saveData($data);
				//Debug::dump($respuesta);
			}


    		echo Json::encode($respuesta);
    		exit;
    	}else{
    		 
    		$respuesta = array (
    				"respuesta" => false,
    				"mensaje" => "FORMULARIO NO VALIDO.",
    		);
    		echo Json::encode($respuesta);
    		exit;
    	}
    
    
    }

	public function adjuntarArchivo( $data , $files ){

		$data['archivo_adjunto'] = $files['archivo_adjunto']['name'] != '' ? $files['archivo_adjunto']['name'] : null;
		$idParametro = $data['idParametro'];

		if ($data['archivo_adjunto'] !== null) {
			$size = new Size(array('min' => 1));
			$filename = $data['archivo_adjunto'];

			$adapter = new \Zend\File\Transfer\Adapter\Http();
			$adapter->setValidators(array               (
											new \Zend\Validator\File\Extension
											(
													array(
															'extension' => array('pdf')
													)
											),
									), $filename);

			if (!$adapter->isValid($filename)){
				$errors = array();
				foreach($adapter->getMessages() as $key => $row) {
					$errors[] = $row;
				}

				return $response = array (
						'respuesta' => false,
						'mensaje' => "El archivo no es una extención del tipo .PDF", //$errors ,
				);

			}

			$destPath = 'public/data/';
			$adapter->setDestination($destPath);

			$fileinfo = $adapter->getFileInfo();

			preg_match('/.+\/(.+)/', $fileinfo['archivo_adjunto']['type'], $matches);

			$extension = $matches[1];



			$SaveDataRepository = new ParametrosRepository($this->getEntityManager());
			//$respuesta = $SaveDataRepository->saveArchivoAdjunto($idParametro,$newFilename);
			$respuesta = $SaveDataRepository->saveData($data,$filename);

			$idParametro = $respuesta['idParametro'];
			$newFilename = $idParametro.'_parametro.pdf';

			$adapter->addFilter('File\Rename',
								array(
										'target' => $destPath . $newFilename,
										'overwrite' => true,
								)
			);


			$var =  $adapter->receive($filename);

			if ($adapter->receive($filename)) {

				$data['archivo_adjunto'] = base64_encode(
						file_get_contents($destPath . $newFilename)
				);

				if (file_exists($destPath . $newFilename)) {
					unlink($destPath . $newFilename);
				}

			}
		}

		return $response = array (
				'respuesta' => true,
				'mensaje' => "SE REGISTRARON CORRECTAMENTE LOS DATOS Y SE ADUNTO CORECTAMENTE EL ARCHIVO." ,
		);

	}

    
    public function cambiarestadoAction(){
    
    	$bdid = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
    	 
    
    	$basesRepository = new ParametrosRepository($this->getEntityManager());
    	$respuesta = $basesRepository->cambiarestado($bdid);
    
    	echo Json::encode($respuesta);
    	exit;
    
    
    }
    
    
    public function eliminarAction(){
    
    	$bdid = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
    
    	$basesRepository = new ParametrosRepository($this->getEntityManager());
    	$respuesta = $basesRepository->remove($bdid);
    
    	echo Json::encode($respuesta);
    	exit;
    
    
    }
}
