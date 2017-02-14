<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FCompetencias
 *
 * @ORM\Table(name="f_competencias")
 * @ORM\Entity
 */
class FCompetencias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_competencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_competencias_id_competencia_seq", allocationSize=1, initialValue=1)
     */
    private $idCompetencia;

    /**
     * @var string
     *
     * @ORM\Column(name="competencia", type="string", length=225, nullable=true)
     */
    private $competencia;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=225, nullable=true)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable=true)
     */
    private $fechaModificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_elaboracion", type="datetime", nullable=true)
     */
    private $fechaElaboracion;

    /**
     * @var string
     *
     * @ORM\Column(name="modificador", type="string", length=100, nullable=true)
     */
    private $modificador;

    /**
     * @var string
     *
     * @ORM\Column(name="elaborador", type="string", length=100, nullable=true)
     */
    private $elaborador;

    /**
     * @var \Application\Entity\FPoai
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\FPoai")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_poai", referencedColumnName="id_poai")
     * })
     */
    private $idPoai;



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
     * @return FCompetencias
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return FCompetencias
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
     * Set estado
     *
     * @param boolean $estado
     * @return FCompetencias
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
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     * @return FCompetencias
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
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return FCompetencias
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
     * Set modificador
     *
     * @param string $modificador
     * @return FCompetencias
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
     * Set elaborador
     *
     * @param string $elaborador
     * @return FCompetencias
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
     * Set idPoai
     *
     * @param \Application\Entity\FPoai $idPoai
     * @return FCompetencias
     */
    public function setIdPoai(\Application\Entity\FPoai $idPoai = null)
    {
        $this->idPoai = $idPoai;
    
        return $this;
    }

    /**
     * Get idPoai
     *
     * @return \Application\Entity\FPoai 
     */
    public function getIdPoai()
    {
        return $this->idPoai;
    }
}