<?php
/**
 * Zend Framework (http://framework.zend.com/).
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 *
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Administracion\Controller;

use Application\Controller\BaseController;
use Application\Entity\Repositories\CoreTablasParametricasRepository;
use Application\Form\PlantillaForm;
use Doctrine\Common\Collections\Criteria;
use DoctrineModule\Paginator\Adapter\Selectable as SelectableAdapter;
use Zend\Debug\Debug;
use Zend\Json\Json;
use Zend\Paginator\Paginator;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 *
 * @package Administracion\Controller
 */
class IndexController extends BaseController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $viewmodel = new ViewModel();

        return $viewmodel;
    }


    /**
     * @return \Zend\Http\Response
     */
    public function enviarAction()
    {
        $viewmodel = new ViewModel();
        $viewmodel->setTerminal(true);

        $id = $this->params()->fromRoute(
            'id', $this->params()->fromQuery('id', '0')
        );

        $paramsContainer = new Container('params');
        $paramsContainer->id = $id;

        $em = $this->getEntityManager();
        $tabla = $em->getRepository('Application\Entity\CoreTablasParametricas')->find($id);

        /*        Debug::dump($tabla->getModule());
                Debug::dump($tabla->getController());
                Debug::dump($tabla->getAction());
                Debug::dump($tabla->getId());

                exit();*/

        return $this->redirect()->toRoute(
            $tabla->getModule(), array(
                                   'controller' => $tabla->getController(), 'action' => $tabla->getAction(),
                                   'id'         => $tabla->getId()
                               )
        );
        // exit(); //return $viewmodel;
    }


    /**
     * @return ViewModel
     */
    public function parametricaAction()
    {
        $request = $this->getRequest();
        $viewmodel = new ViewModel();
        $viewmodel->setTerminal($request->isXmlHttpRequest());
        //id de la tabla parametrica
        //$id = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
        $paramsContainer = new Container('params');
        //$paramsContainer->id = $id;
        if ($paramsContainer->offsetExists('id')) {
            $id = $paramsContainer->offsetGet('id');
        }

        // Debug::dump($id); exit();
        //obtenemos los datos de la tabla parametrica
        $em = $this->getEntityManager();
        $tabla = $em->getRepository('Application\Entity\CoreTablasParametricas')->find($id);
        //nombre de la clase para obtener la lista
        $clase = $tabla->getClase();

        $claseEntity = 'Application\\Entity\\' . $clase;

        //cabecera de la lista
        $cabecera = explode('|', $tabla->getCabecera());
        //valores de la lista
        $dato = explode('|', $tabla->getData());

        //$listado = $em->getRepository($claseEntity)->findAll();
        $listado = $em->getRepository($claseEntity)->findBy(
            array(), array('id' => Criteria::DESC)
        );

        $viewmodel->setVariables(
            array(
                'tabla' => $tabla,
                'listado' => $listado,
                'page' => 1,
                'id' => $id,
                'cabecera' => $cabecera,
                'dato'  => $dato,
            )
        );

        //        $widgetModel = new ViewModel();
        //        $widgetModel->setTemplate('application/index/will');

        /*$widgetModel = $this->forward()->dispatch(
            'Application\Controller\Index', array('action' => 'will',)
        );*/

        //$viewmodel->addChild($widgetModel, 'widgetModel');

        return $viewmodel;
    }


    public function eliminarAction()
    {
        $id = $this->params()->fromRoute(
            'id', $this->params()->fromQuery('id', '0')
        );
        $paramsContainer = new Container('params');
        if ($paramsContainer->offsetExists('id')) {
            $clase_id = $paramsContainer->offsetGet('id');
        }
        $CoreTablasParametricasRepository
            = new CoreTablasParametricasRepository($this->getEntityManager());
        $respuesta = $CoreTablasParametricasRepository->remove($id, $clase_id);
        echo Json::encode($respuesta);
        exit;
    }

    public function cambiarestadoAction()
    {
        $id = $this->params()->fromRoute(
            'id', $this->params()->fromQuery('id', '0')
        );
        $paramsContainer = new Container('params');
        if ($paramsContainer->offsetExists('id'))
        {
            $clase_id = $paramsContainer->offsetGet('id');
        }

        //Debug::dump($id);
        //Debug::dump($clase_id);

        $CoreTablasParametricasRepository = new CoreTablasParametricasRepository($this->getEntityManager());
        $respuesta = $CoreTablasParametricasRepository->changestate( $id, $clase_id);
        echo Json::encode($respuesta);
        exit;
    }


    /** V
     *
     * @deprecated
     */
    public function parametricaConPaginadorAction()
    {
        $request = $this->getRequest();
        $viewmodel = new ViewModel();
        $viewmodel->setTerminal($request->isXmlHttpRequest());
        //id de la tabla parametrica
        //$id = $this->params()->fromRoute('id',$this->params()->fromQuery('id','0'));
        $paramsContainer = new Container('params');
        //$paramsContainer->id = $id;
        if ($paramsContainer->offsetExists('id')) {
            $id = $paramsContainer->offsetGet('id');
        }

        //obtenemos los datos de la tabla parametrica
        $em = $this->getEntityManager();
        $tabla = $em->getRepository('Application\Entity\CoreTablasParametricas')->find($id);
        //nombre de la clase para obtener la lista
        $clase = $tabla->getClase();
        //cabecera de la lista
        $cabecera = explode('|', $tabla->getColumn());
        //valores de la lista
        $dato = explode('|', $tabla->getData());
        //generar la paginacion
        $criteria = Criteria::create()->orderBy(array('id' => Criteria::DESC));
        $adapter = new SelectableAdapter($em->getRepository($clase), $criteria);
        $page = 1;
        if ($this->params()->fromQuery('page')) {
            $page = $this->params()->fromQuery('page');
        }
        $listado = new Paginator($adapter);
        $listado->setCurrentPageNumber((int)$page)->setItemCountPerPage(
            $tabla->getPage()
        );
        //enviar las variablea a lista
        $viewmodel->setVariables(
            array(
                'tabla' => $tabla, 'listado' => $listado, 'page' => $page, 'id' => $id, 'cabecera' => $cabecera,
                'dato'  => $dato,
            )
        );

        return $viewmodel;
    }

    /**
     * @return ViewModel
     * @throws \Exception
     */
    public function formAction()
    {
        $request = $this->getRequest();
        $viewmodel = new ViewModel();
        $viewmodel->setTerminal($request->isXmlHttpRequest());

        $paramsContainer = new Container('params');
        //$paramsContainer->id = $id;
        if ($paramsContainer->offsetExists('id')) {
            $id = $paramsContainer->offsetGet('id');
        } else {
            $id = 0;
        }
        //$id = 0;
        //Debug::dump($this->params()->fromRoute('id2', $this->params()->fromQuery('id2', '0')));
        $em = $this->getEntityManager();
        $tabla = $em->getRepository('Application\Entity\CoreTablasParametricas')->find($id);
        //Generar Formulario
        $errorEnFormulario = false;
        $options = array(
            'em' => $this->getEntityManager(), 'use_filter' => true
        );
        $form = new PlantillaForm($tabla->getFormName(), $options);

        //Edicion
        $ArrayDataRepository = new CoreTablasParametricasRepository($this->getEntityManager());
        $dato = $ArrayDataRepository->getForm(
            $this->params()->fromRoute('id2', $this->params()->fromQuery('id2', '0')), $tabla->getClase()
        );
        if ($dato) {
            $form->setData($dato);
        }

        if (!$this->request->isPost()) {
            $viewmodel->setVariables(
                array(
                    'tabla' => $tabla, 'form' => $form, 'error_en_formulario' => $errorEnFormulario,
                )
            );

            /*$widgetModel = $this->forward()->dispatch(
                'Application\Controller\Index', array('action' => 'will',)
            );

            $viewmodel->addChild($widgetModel, 'widgetModel');*/

            return $viewmodel;
        }

        $post = $this->request->getPost()->toArray();
        unset($post['Registrar']);
        $form->setData($post);
        if ($form->isValid()) {
            $SaveDataRepository = new CoreTablasParametricasRepository($this->getEntityManager());
            $respuesta = $SaveDataRepository->saveData($post, $tabla->getClase(), $id);
            echo Json::encode($respuesta);
            exit;
        } else {
            $respuesta = array(
                'respuesta' => false, 'mensaje' => 'FORMULARIO NO VALIDO.',
            );
            echo Json::encode($respuesta);
            exit;
        }
    }

    //    public function editarAction()
    //    {
    //        $request = $this->getRequest();
    //        $viewmodel = new ViewModel();
    //        $viewmodel->setTerminal($request->isXmlHttpRequest());

    //        $paramsContainer = new Container('params');
    //        if ($paramsContainer->offsetExists('id'))
    //            $id = $paramsContainer->offsetGet('id');
    //        $em = $this->getEntityManager();
    //        $tabla = $em->getRepository('Application\Entity\CoreTablasParametricas')->find($id);
    //        $errorEnFormulario = false;
    //        $options = array("em" => $this->getEntityManager(),
    //            "use_filter" => true);
    //        $form = new PlantillaForm($tabla->getFormName(), $options);
    //        $ArrayDataRepository = new CoreTablasParametricasRepository($this->getEntityManager());

    //        $dato = $ArrayDataRepository->getForm($this->params()->fromRoute('id', $this->params()->fromQuery('id', '0')), $tabla->getClase());

    ////        $datos = $dato;
    ////        var_dump($datos);
    //        $form->setData($dato);
    //  /*      $viewmodel->setVariables(array(
    //            'tabla' => $tabla,
    //            "form" => $form,
    //            "error_en_formulario" => $errorEnFormulario,
    //        ));
    //        return $viewmodel;*/

    //        if (!$this->request->isPost()) {
    //            $viewmodel->setVariables(array(
    //                'tabla' => $tabla,
    //                "form" => $form,
    //                "error_en_formulario" => $errorEnFormulario,
    //            ));
    //            return $viewmodel;
    //        }

    //    }
}
