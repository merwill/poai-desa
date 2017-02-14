<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreFormularioObjetos.
 *
 * @ORM\Table(name="crudadmin.core_formulario_objetos", indexes={@ORM\Index(name="IDX_8F06E649E77D4D27", columns={"form_param_id"})})
 * @ORM\Entity
 */
class CoreFormularioObjetos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="crudadmin.core_formulario_objetos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=250, nullable=true)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="object_type", type="string", length=100, nullable=true)
     */
    private $objectType;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", nullable=true)
     */
    private $size;

    /**
     * @var int
     *
     * @ORM\Column(name="maxlength", type="integer", nullable=true)
     */
    private $maxlength;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=250, nullable=true)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=250, nullable=true)
     */
    private $title;

    /**
     * @var bool
     *
     * @ORM\Column(name="readonly", type="boolean", nullable=true)
     */
    private $readonly;

    /**
     * @var string
     *
     * @ORM\Column(name="ondimamic", type="string", length=250, nullable=true)
     */
    private $ondimamic;

    /**
     * @var bool
     *
     * @ORM\Column(name="disabled", type="boolean", nullable=true)
     */
    private $disabled;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_validacion", type="string", length=100, nullable=true)
     */
    private $tipoValidacion;

    /**
     * @var bool
     *
     * @ORM\Column(name="required", type="boolean", nullable=true)
     */
    private $required;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=150, nullable=true)
     */
    private $class;

    /**
     * @var string
     *
     * @ORM\Column(name="campos", type="string", length=150, nullable=true)
     */
    private $campos;

    /**
     * @var bool
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="error_message", type="string", length=250, nullable=true)
     */
    private $errorMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="placeholder", type="string", length=100, nullable=true)
     */
    private $placeholder;

    /**
     * @var \Application\Entity\FormularioParametros
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\FormularioParametros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="form_param_id", referencedColumnName="id")
     * })
     */
    private $formParam;

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
     * Set orden.
     *
     * @param int $orden
     *
     * @return CoreFormularioObjetos
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden.
     *
     * @return int
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set label.
     *
     * @param string $label
     *
     * @return CoreFormularioObjetos
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return CoreFormularioObjetos
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set objectType.
     *
     * @param string $objectType
     *
     * @return CoreFormularioObjetos
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;

        return $this;
    }

    /**
     * Get objectType.
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * Set size.
     *
     * @param string $size
     *
     * @return CoreFormularioObjetos
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size.
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set maxlength.
     *
     * @param int $maxlength
     *
     * @return CoreFormularioObjetos
     */
    public function setMaxlength($maxlength)
    {
        $this->maxlength = $maxlength;

        return $this;
    }

    /**
     * Get maxlength.
     *
     * @return int
     */
    public function getMaxlength()
    {
        return $this->maxlength;
    }

    /**
     * Set value.
     *
     * @param string $value
     *
     * @return CoreFormularioObjetos
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return CoreFormularioObjetos
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set readonly.
     *
     * @param bool $readonly
     *
     * @return CoreFormularioObjetos
     */
    public function setReadonly($readonly)
    {
        $this->readonly = $readonly;

        return $this;
    }

    /**
     * Get readonly.
     *
     * @return bool
     */
    public function getReadonly()
    {
        return $this->readonly;
    }

    /**
     * Set ondimamic.
     *
     * @param string $ondimamic
     *
     * @return CoreFormularioObjetos
     */
    public function setOndimamic($ondimamic)
    {
        $this->ondimamic = $ondimamic;

        return $this;
    }

    /**
     * Get ondimamic.
     *
     * @return string
     */
    public function getOndimamic()
    {
        return $this->ondimamic;
    }

    /**
     * Set disabled.
     *
     * @param bool $disabled
     *
     * @return CoreFormularioObjetos
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * Get disabled.
     *
     * @return bool
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set tipoValidacion.
     *
     * @param string $tipoValidacion
     *
     * @return CoreFormularioObjetos
     */
    public function setTipoValidacion($tipoValidacion)
    {
        $this->tipoValidacion = $tipoValidacion;

        return $this;
    }

    /**
     * Get tipoValidacion.
     *
     * @return string
     */
    public function getTipoValidacion()
    {
        return $this->tipoValidacion;
    }

    /**
     * Set required.
     *
     * @param bool $required
     *
     * @return CoreFormularioObjetos
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required.
     *
     * @return bool
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set class.
     *
     * @param string $class
     *
     * @return CoreFormularioObjetos
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set campos.
     *
     * @param string $campos
     *
     * @return CoreFormularioObjetos
     */
    public function setCampos($campos)
    {
        $this->campos = $campos;

        return $this;
    }

    /**
     * Get campos.
     *
     * @return string
     */
    public function getCampos()
    {
        return $this->campos;
    }

    /**
     * Set estado.
     *
     * @param bool $estado
     *
     * @return CoreFormularioObjetos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado.
     *
     * @return bool
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set errorMessage.
     *
     * @param string $errorMessage
     *
     * @return CoreFormularioObjetos
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }

    /**
     * Get errorMessage.
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Set placeholder.
     *
     * @param string $placeholder
     *
     * @return CoreFormularioObjetos
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Get placeholder.
     *
     * @return string
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    /**
     * Set formParam.
     *
     * @param \Application\Entity\FormularioParametros $formParam
     *
     * @return CoreFormularioObjetos
     */
    public function setFormParam(\Application\Entity\FormularioParametros $formParam = null)
    {
        $this->formParam = $formParam;

        return $this;
    }

    /**
     * Get formParam.
     *
     * @return \Application\Entity\FormularioParametros
     */
    public function getFormParam()
    {
        return $this->formParam;
    }
}
