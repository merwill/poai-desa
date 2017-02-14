<?php
/**
 * MINISTERIO DE ECONOMIA Y FINANZAS PUBLICAS
 * UNIDAD DE TECNOLOGIAS DE INFORMACION
 * SISTEMA .....
 * MODULO: Application
 * AUTOR: ...
 * FECHA: ...
 */

namespace Application\Controller;

use Application\Entity\Repositories\UtilsRepository;
use Zend\Debug\Debug;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;


class IndexController extends BaseController
{
    public function indexAction()
    {
        //$entidades = new EntidadesRepository($this->getEntityManager());
        //$resultado = $entidades->getForm('ENDE');

        $sql = "select p.* from get_unidades_by_entidad(35) p";

        $util = new UtilsRepository($this->getEntityManager('prod_mof'));
        $resultado = $util->execNativeSql($sql);
       // Debug::dump($resultado);

        $resultado = null;

        return new ViewModel(array('resultado' => $resultado));
    }

    public function debugAction()
    {
        $session = new Container('datos_sesion');
        $request = $session->datos_sesion;
        $session->datos_sesion = $request;
        $sesion_variables = $request;
        return new ViewModel(array("sesion_variables" => $sesion_variables));
    }

}
