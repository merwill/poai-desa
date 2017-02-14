<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ERecomendaciones
 *
 * @ORM\Table(name="e_recomendaciones")
 * @ORM\Entity
 */
class ERecomendaciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_recomendaciones", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_recomendaciones_id_recomendaciones_seq", allocationSize=1, initialValue=1)
     */
    private $idRecomendaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="debe_mejorar", type="string", length=225, nullable=true)
     */
    private $debeMejorar;

    /**
     * @var string
     *
     * @ORM\Column(name="accion_propuesta", type="string", length=225, nullable=true)
     */
    private $accionPropuesta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable=true)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime", nullable=true)
     */
    private $fechaFin;

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
     * Get idRecomendaciones
     *
     * @return integer 
     */
    public function getIdRecomendaciones()
    {
        return $this->idRecomendaciones;
    }

    /**
     * Set debeMejorar
     *
     * @param string $debeMejorar
     * @return ERecomendaciones
     */
    public function setDebeMejorar($debeMejorar)
    {
        $this->debeMejorar = $debeMejorar;
    
        return $this;
    }

    /**
     * Get debeMejorar
     *
     * @return string 
     */
    public function getDebeMejorar()
    {
        return $this->debeMejorar;
    }

    /**
     * Set accionPropuesta
     *
     * @param string $accionPropuesta
     * @return ERecomendaciones
     */
    public function setAccionPropuesta($accionPropuesta)
    {
        $this->accionPropuesta = $accionPropuesta;
    
        return $this;
    }

    /**
     * Get accionPropuesta
     *
     * @return string 
     */
    public function getAccionPropuesta()
    {
        return $this->accionPropuesta;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return ERecomendaciones
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return ERecomendaciones
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return ERecomendaciones
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
     * @return ERecomendaciones
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
     * @return ERecomendaciones
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
     * @return ERecomendaciones
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
     * @return ERecomendaciones
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