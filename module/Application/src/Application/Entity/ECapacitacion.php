<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ECapacitacion
 *
 * @ORM\Table(name="e_capacitacion")
 * @ORM\Entity
 */
class ECapacitacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_capacitacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_capacitacion_id_capacitacion_seq", allocationSize=1, initialValue=1)
     */
    private $idCapacitacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=225, nullable=true)
     */
    private $descripcion;

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
     * @var \Application\Entity\EEvaluacion
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EEvaluacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evaluacion", referencedColumnName="id_evaluacion")
     * })
     */
    private $idEvaluacion;



    /**
     * Get idCapacitacion
     *
     * @return integer 
     */
    public function getIdCapacitacion()
    {
        return $this->idCapacitacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ECapacitacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return ECapacitacion
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
     * @return ECapacitacion
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
     * @return ECapacitacion
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
     * @return ECapacitacion
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

    /**
     * Set idEvaluacion
     *
     * @param \Application\Entity\EEvaluacion $idEvaluacion
     * @return ECapacitacion
     */
    public function setIdEvaluacion(\Application\Entity\EEvaluacion $idEvaluacion = null)
    {
        $this->idEvaluacion = $idEvaluacion;
    
        return $this;
    }

    /**
     * Get idEvaluacion
     *
     * @return \Application\Entity\EEvaluacion 
     */
    public function getIdEvaluacion()
    {
        return $this->idEvaluacion;
    }
}