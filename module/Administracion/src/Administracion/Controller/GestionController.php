<?php
/**
 * MINISTERIO DE ECONOMIA Y FINANZAS PUBLICAS
 * UNIDAD DE TECNOLOGIAS DE INFORMACION
 * SISTEMA .....
 * MODULO: Application
 * AUTOR: ...
 * FECHA: ...
 */

namespace Administracion\Controller;

use Administracion\Form\FormPeriodo;
use Application\Controller\BaseController;
use Application\Entity\Repositories\GestionPeriodoRepository;
use Application\Entity\Repositories\ParametrosRepository;
use Application\Entity\Repositories\UtilsRepository;
use Zend\Debug\Debug;
use Zend\Json\Json;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;


class GestionController extends BaseController
{
    public function indexAction()
    {

        $sql = "select gp.* from gestion_periodo gp";

        $util = new UtilsRepository($this->getEntityManager());
        $listadoDatos = $util->execNativeSql($sql);
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



        $form = new FormPeriodo('frmPeriodo' , $bdid );

        if ($bdid != '0') {
            //$basesRepository = new ParametrosRepository($this->getEntityManager());
            //$dato = $basesRepository->getForm($bdid);

            $sql = "select gp.* from gestion_periodo gp where id_gp = $bdid";

            $util = new UtilsRepository($this->getEntityManager());
            $registro = $util->execNativeSql($sql);
            $registro = $registro[0];
            $registro['fecha_ini'] = \MisLibrerias\Fecha::formatFechaDMY($registro['fecha_ini']);
            $registro['fecha_fin'] = \MisLibrerias\Fecha::formatFechaDMY($registro['fecha_fin']);

           // Debug::dump($registro);
            $form -> setData($registro);

        }


        if (!$this->request->isPost()) {

            $viewmodel->setVariables(array(
                                         "form"=>$form,
                                         "id_gp" => $bdid,
                                     ));
            return $viewmodel;
        }

        $data = $request->getPost()->toArray();
        unset($data['Registrar']);
        $form->setData($data);

        if($form->isValid()){


            $SaveDataRepository = new GestionPeriodoRepository($this->getEntityManager());
            $respuesta = $SaveDataRepository->saveData($data);

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

    public function cambiarVigenciaAction(){

        $bdid = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));


        $basesRepository = new GestionPeriodoRepository($this->getEntityManager());
        $respuesta = $basesRepository->cambiaVigencia($bdid);

        echo Json::encode($respuesta);
        exit;


    }


    public function fsaCrearGestionesAction()
    {
        $resultado = null;
        return new ViewModel(array('resultado' => $resultado));
    }
    public function fsaHistorialGestionesAction()
    {

        //$post = $this->request->getPost()->toArray();
        //Debug::dump($post);
        //return new ViewModel();
        if($this->request->isPost()){

            return $this->redirect()->toUrl('/');
        }else {

            $resultado = null;
            return new ViewModel(array('resultado' => $resultado));
        }
    }
}
