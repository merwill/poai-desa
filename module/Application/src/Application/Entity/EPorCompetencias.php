<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EPorCompetencias
 *
 * @ORM\Table(name="e_por_competencias")
 * @ORM\Entity
 */
class EPorCompetencias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_competencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_por_competencias_id_competencia_seq", allocationSize=1, initialValue=1)
     */
    private $idCompetencia;

    /**
     * @var string
     *
     * @ORM\Column(name="competencia", type="string", length=50, nullable=true)
     */
    private $competencia;

    /**
     * @var string
     *
     * @ORM\Column(name="comportamiento", type="string", length=225, nullable=true)
     */
    private $comportamiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacion", type="integer", nullable=true)
     */
    private $calificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="resultado", type="integer", nullable=true)
     */
    private $resultado;

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
     * Get idCompetencia
     *
     * @return integer 
     */
    public function getIdCompetencia()
    {
        return $this->idCompetencia;
    }

    /**
     * Set competencia
     *
     * @param string $competencia
     * @return EPorCompetencias
     */
    public function setCompetencia($competencia)
    {
        $this->competencia = $competencia;
    
        return $this;
    }

    /**
     * Get competencia
     *
     * @return string 
     */
    public function getCompetencia()
    {
        return $this->competencia;
    }

    /**
     * Set comportamiento
     *
     * @param string $comportamiento
     * @return EPorCompetencias
     */
    public function setComportamiento($comportamiento)
    {
        $this->comportamiento = $comportamiento;
    
        return $this;
    }

    /**
     * Get comportamiento
     *
     * @return string 
     */
    public function getComportamiento()
    {
        return $this->comportamiento;
    }

    /**
     * Set calificacion
     *
     * @param integer $calificacion
     * @return EPorCompetencias
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;
    
        return $this;
    }

    /**
     * Get calificacion
     *
     * @return integer 
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * Set resultado
     *
     * @param integer $resultado
     * @return EPorCompetencias
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    
        return $this;
    }

    /**
     * Get resultado
     *
     * @return integer 
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return EPorCompetencias
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
     * @return EPorCompetencias
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
     * @return EPorCompetencias
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
     * @return EPorCompetencias
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
     * @return EPorCompetencias
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