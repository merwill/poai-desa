<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreTablasParametricas.
 *
 * @ORM\Table(name="crudadmin.core_tablas_parametricas")
 * @ORM\Entity
 */
class CoreTablasParametricas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="crudadmin.cla_tablas_parametricas_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="module", type="string", length=100, nullable=false)
     */
    private $module;

    /**
     * @var int
     *
     * @ORM\Column(name="tipo_tabla", type="integer", nullable=false)
     */
    private $tipoTabla = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="clase", type="string", length=100, nullable=true)
     */
    private $clase;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=150, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="controller", type="string", length=100, nullable=true)
     */
    private $controller;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=100, nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="cabecera", type="string", nullable=true)
     */
    private $cabecera;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", nullable=true)
     */
    private $data;

    /**
     * @var int
     *
     * @ORM\Column(name="page", type="integer", nullable=true)
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="td_action", type="string", length=100, nullable=true)
     */
    private $tdAction;

    /**
     * @var string
     *
     * @ORM\Column(name="form_name", type="string", length=50, nullable=true)
     */
    private $formName;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return CoreTablasParametricas
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set module.
     *
     * @param string $module
     *
     * @return CoreTablasParametricas
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module.
     *
     * @return string
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set tipoTabla.
     *
     * @param int $tipoTabla
     *
     * @return CoreTablasParametricas
     */
    public function setTipoTabla($tipoTabla)
    {
        $this->tipoTabla = $tipoTabla;

        return $this;
    }

    /**
     * Get tipoTabla.
     *
     * @return int
     */
    public function getTipoTabla()
    {
        return $this->tipoTabla;
    }

    /**
     * Set clase.
     *
     * @param string $clase
     *
     * @return CoreTablasParametricas
     */
    public function setClase($clase)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Get clase.
     *
     * @return string
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Set descripcion.
     *
     * @param string $descripcion
     *
     * @return CoreTablasParametricas
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion.
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set controller.
     *
     * @param string $controller
     *
     * @return CoreTablasParametricas
     */
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get controller.
     *
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set action.
     *
     * @param string $action
     *
     * @return CoreTablasParametricas
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set cabecera.
     *
     * @param string $cabecera
     *
     * @return CoreTablasParametricas
     */
    public function setCabecera($cabecera)
    {
        $this->cabecera = $cabecera;

        return $this;
    }

    /**
     * Get cabecera.
     *
     * @return string
     */
    public function getCabecera()
    {
        return $this->cabecera;
    }

    /**
     * Set data.
     *
     * @param string $data
     *
     * @return CoreTablasParametricas
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data.
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set page.
     *
     * @param int $page
     *
     * @return CoreTablasParametricas
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page.
     *
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set tdAction.
     *
     * @param string $tdAction
     *
     * @return CoreTablasParametricas
     */
    public function setTdAction($tdAction)
    {
        $this->tdAction = $tdAction;

        return $this;
    }

    /**
     * Get tdAction.
     *
     * @return string
     */
    public function getTdAction()
    {
        return $this->tdAction;
    }

    /**
     * Set formName.
     *
     * @param string $formName
     *
     * @return CoreTablasParametricas
     */
    public function setFormName($formName)
    {
        $this->formName = $formName;

        return $this;
    }

    /**
     * Get formName.
     *
     * @return string
     */
    public function getFormName()
    {
        return $this->formName;
    }
}
