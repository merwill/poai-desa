<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EPotencial
 *
 * @ORM\Table(name="e_potencial")
 * @ORM\Entity
 */
class EPotencial
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_potencial", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_potencial_id_potencial_seq", allocationSize=1, initialValue=1)
     */
    private $idPotencial;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacion_horas_capacitacion", type="integer", nullable=true)
     */
    private $calificacionHorasCapacitacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacaion_curso_capacitacion", type="integer", nullable=true)
     */
    private $calificacaionCursoCapacitacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntaje_final", type="integer", nullable=true)
     */
    private $puntajeFinal;

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
     * Get idPotencial
     *
     * @return integer 
     */
    public function getIdPotencial()
    {
        return $this->idPotencial;
    }

    /**
     * Set calificacionHorasCapacitacion
     *
     * @param integer $calificacionHorasCapacitacion
     * @return EPotencial
     */
    public function setCalificacionHorasCapacitacion($calificacionHorasCapacitacion)
    {
        $this->calificacionHorasCapacitacion = $calificacionHorasCapacitacion;
    
        return $this;
    }

    /**
     * Get calificacionHorasCapacitacion
     *
     * @return integer 
     */
    public function getCalificacionHorasCapacitacion()
    {
        return $this->calificacionHorasCapacitacion;
    }

    /**
     * Set calificacaionCursoCapacitacion
     *
     * @param integer $calificacaionCursoCapacitacion
     * @return EPotencial
     */
    public function setCalificacaionCursoCapacitacion($calificacaionCursoCapacitacion)
    {
        $this->calificacaionCursoCapacitacion = $calificacaionCursoCapacitacion;
    
        return $this;
    }

    /**
     * Get calificacaionCursoCapacitacion
     *
     * @return integer 
     */
    public function getCalificacaionCursoCapacitacion()
    {
        return $this->calificacaionCursoCapacitacion;
    }

    /**
     * Set puntajeFinal
     *
     * @param integer $puntajeFinal
     * @return EPotencial
     */
    public function setPuntajeFinal($puntajeFinal)
    {
        $this->puntajeFinal = $puntajeFinal;
    
        return $this;
    }

    /**
     * Get puntajeFinal
     *
     * @return integer 
     */
    public function getPuntajeFinal()
    {
        return $this->puntajeFinal;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return EPotencial
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
     * @return EPotencial
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
     * @return EPotencial
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
     * @return EPotencial
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
     * @return EPotencial
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