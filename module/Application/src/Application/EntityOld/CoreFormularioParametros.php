<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreFormularioParametros.
 *
 * @ORM\Table(name="crudadmin.core_formulario_parametros")
 * @ORM\Entity
 */
class CoreFormularioParametros
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="crudadmin.core_formulario_parametros_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="form_name", type="string", length=150, nullable=true)
     */
    private $formName;

    /**
     * @var string
     *
     * @ORM\Column(name="accion", type="string", length=250, nullable=true)
     */
    private $accion;

    /**
     * @var string
     *
     * @ORM\Column(name="metodo", type="string", nullable=true)
     */
    private $metodo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_accion", type="string", length=250, nullable=true)
     */
    private $tipoAccion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="autocomplete", type="string", nullable=true)
     */
    private $autocomplete;

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
     * Set formName.
     *
     * @param string $formName
     *
     * @return CoreFormularioParametros
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

    /**
     * Set accion.
     *
     * @param string $accion
     *
     * @return CoreFormularioParametros
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;

        return $this;
    }

    /**
     * Get accion.
     *
     * @return string
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set metodo.
     *
     * @param string $metodo
     *
     * @return CoreFormularioParametros
     */
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;

        return $this;
    }

    /**
     * Get metodo.
     *
     * @return string
     */
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * Set tipoAccion.
     *
     * @param string $tipoAccion
     *
     * @return CoreFormularioParametros
     */
    public function setTipoAccion($tipoAccion)
    {
        $this->tipoAccion = $tipoAccion;

        return $this;
    }

    /**
     * Get tipoAccion.
     *
     * @return string
     */
    public function getTipoAccion()
    {
        return $this->tipoAccion;
    }

    /**
     * Set estado.
     *
     * @param string $estado
     *
     * @return CoreFormularioParametros
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado.
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set autocomplete.
     *
     * @param string $autocomplete
     *
     * @return CoreFormularioParametros
     */
    public function setAutocomplete($autocomplete)
    {
        $this->autocomplete = $autocomplete;

        return $this;
    }

    /**
     * Get autocomplete.
     *
     * @return string
     */
    public function getAutocomplete()
    {
        return $this->autocomplete;
    }
}
