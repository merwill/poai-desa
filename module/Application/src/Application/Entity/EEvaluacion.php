<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EEvaluacion
 *
 * @ORM\Table(name="e_evaluacion")
 * @ORM\Entity
 */
class EEvaluacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_evaluacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_evaluacion_id_evaluacion_seq", allocationSize=1, initialValue=1)
     */
    private $idEvaluacion;

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
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_reunion", type="datetime", nullable=true)
     */
    private $fechaReunion;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntaje_total_evaluacion", type="integer", nullable=true)
     */
    private $puntajeTotalEvaluacion;

    /**
     * @var \Application\Entity\Puesto
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Puesto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nro_item", referencedColumnName="nro_item")
     * })
     */
    private $nroItem;



    /**
     * Get idEvaluacion
     *
     * @return integer 
     */
    public function getIdEvaluacion()
    {
        return $this->idEvaluacion;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return EEvaluacion
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
     * @return EEvaluacion
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
     * @return EEvaluacion
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
     * @return EEvaluacion
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
     * Set estado
     *
     * @param boolean $estado
     * @return EEvaluacion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fechaReunion
     *
     * @param \DateTime $fechaReunion
     * @return EEvaluacion
     */
    public function setFechaReunion($fechaReunion)
    {
        $this->fechaReunion = $fechaReunion;
    
        return $this;
    }

    /**
     * Get fechaReunion
     *
     * @return \DateTime 
     */
    public function getFechaReunion()
    {
        return $this->fechaReunion;
    }

    /**
     * Set puntajeTotalEvaluacion
     *
     * @param integer $puntajeTotalEvaluacion
     * @return EEvaluacion
     */
    public function setPuntajeTotalEvaluacion($puntajeTotalEvaluacion)
    {
        $this->puntajeTotalEvaluacion = $puntajeTotalEvaluacion;
    
        return $this;
    }

    /**
     * Get puntajeTotalEvaluacion
     *
     * @return integer 
     */
    public function getPuntajeTotalEvaluacion()
    {
        return $this->puntajeTotalEvaluacion;
    }

    /**
     * Set nroItem
     *
     * @param \Application\Entity\Puesto $nroItem
     * @return EEvaluacion
     */
    public function setNroItem(\Application\Entity\Puesto $nroItem = null)
    {
        $this->nroItem = $nroItem;
    
        return $this;
    }

    /**
     * Get nroItem
     *
     * @return \Application\Entity\Puesto 
     */
    public function getNroItem()
    {
        return $this->nroItem;
    }
}