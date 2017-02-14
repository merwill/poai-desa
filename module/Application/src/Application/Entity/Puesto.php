<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Puesto
 *
 * @ORM\Table(name="puesto")
 * @ORM\Entity
 */
class Puesto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nro_item", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="puesto_nro_item_seq", allocationSize=1, initialValue=1)
     */
    private $nroItem;

    /**
     * @var string
     *
     * @ORM\Column(name="nivel", type="string", length=100, nullable=true)
     */
    private $nivel;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=100, nullable=true)
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacion_puesto", type="string", length=100, nullable=true)
     */
    private $denominacionPuesto;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacion_cargo", type="string", length=100, nullable=true)
     */
    private $denominacionCargo;

    /**
     * @var string
     *
     * @ORM\Column(name="dependencia_organizacional", type="string", length=100, nullable=true)
     */
    private $dependenciaOrganizacional;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_elaboracion", type="datetime", nullable=true)
     */
    private $fechaElaboracion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable=true)
     */
    private $fechaModificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="elaborador", type="string", length=100, nullable=true)
     */
    private $elaborador;

    /**
     * @var string
     *
     * @ORM\Column(name="modificador", type="string", length=100, nullable=true)
     */
    private $modificador;



    /**
     * Get nroItem
     *
     * @return integer 
     */
    public function getNroItem()
    {
        return $this->nroItem;
    }

    /**
     * Set nivel
     *
     * @param string $nivel
     * @return Puesto
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    
        return $this;
    }

    /**
     * Get nivel
     *
     * @return string 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     * @return Puesto
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set denominacionPuesto
     *
     * @param string $denominacionPuesto
     * @return Puesto
     */
    public function setDenominacionPuesto($denominacionPuesto)
    {
        $this->denominacionPuesto = $denominacionPuesto;
    
        return $this;
    }

    /**
     * Get denominacionPuesto
     *
     * @return string 
     */
    public function getDenominacionPuesto()
    {
        return $this->denominacionPuesto;
    }

    /**
     * Set denominacionCargo
     *
     * @param string $denominacionCargo
     * @return Puesto
     */
    public function setDenominacionCargo($denominacionCargo)
    {
        $this->denominacionCargo = $denominacionCargo;
    
        return $this;
    }

    /**
     * Get denominacionCargo
     *
     * @return string 
     */
    public function getDenominacionCargo()
    {
        return $this->denominacionCargo;
    }

    /**
     * Set dependenciaOrganizacional
     *
     * @param string $dependenciaOrganizacional
     * @return Puesto
     */
    public function setDependenciaOrganizacional($dependenciaOrganizacional)
    {
        $this->dependenciaOrganizacional = $dependenciaOrganizacional;
    
        return $this;
    }

    /**
     * Get dependenciaOrganizacional
     *
     * @return string 
     */
    public function getDependenciaOrganizacional()
    {
        return $this->dependenciaOrganizacional;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return Puesto
     */
    public function setFechaElaboracion($fechaElaboracion)
    {
        $this->fechaElaboracion = $fechaElaboracion;
    
        return $this;
    }

    /**
     * Get fechaElaboracion
     *
     * @return \DateTime 
     */
    public function getFechaElaboracion()
    {
        return $this->fechaElaboracion;
    }

    /**
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     * @return Puesto
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;
    
        return $this;
    }

    /**
     * Get fechaModificacion
     *
     * @return \DateTime 
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Set elaborador
     *
     * @param string $elaborador
     * @return Puesto
     */
    public function setElaborador($elaborador)
    {
        $this->elaborador = $elaborador;
    
        return $this;
    }

    /**
     * Get elaborador
     *
     * @return string 
     */
    public function getElaborador()
    {
        return $this->elaborador;
    }

    /**
     * Set modificador
     *
     * @param string $modificador
     * @return Puesto
     */
    public function setModificador($modificador)
    {
        $this->modificador = $modificador;
    
        return $this;
    }

    /**
     * Get modificador
     *
     * @return string 
     */
    public function getModificador()
    {
        return $this->modificador;
    }
}