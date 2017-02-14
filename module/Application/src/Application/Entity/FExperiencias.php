<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FExperiencias
 *
 * @ORM\Table(name="f_experiencias")
 * @ORM\Entity
 */
class FExperiencias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_experiencia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_experiencias_id_experiencia_seq", allocationSize=1, initialValue=1)
     */
    private $idExperiencia;

    /**
     * @var string
     *
     * @ORM\Column(name="area_experiencia", type="string", length=225, nullable=true)
     */
    private $areaExperiencia;

    /**
     * @var string
     *
     * @ORM\Column(name="sector", type="string", length=100, nullable=true)
     */
    private $sector;

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
     * @var integer
     *
     * @ORM\Column(name="id_experiencias_p", type="integer", nullable=true)
     */
    private $idExperienciasP;

    /**
     * @var string
     *
     * @ORM\Column(name="prioridad_experiencia", type="string", length=30, nullable=true)
     */
    private $prioridadExperiencia;

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
     * Get idExperiencia
     *
     * @return integer 
     */
    public function getIdExperiencia()
    {
        return $this->idExperiencia;
    }

    /**
     * Set areaExperiencia
     *
     * @param string $areaExperiencia
     * @return FExperiencias
     */
    public function setAreaExperiencia($areaExperiencia)
    {
        $this->areaExperiencia = $areaExperiencia;
    
        return $this;
    }

    /**
     * Get areaExperiencia
     *
     * @return string 
     */
    public function getAreaExperiencia()
    {
        return $this->areaExperiencia;
    }

    /**
     * Set sector
     *
     * @param string $sector
     * @return FExperiencias
     */
    public function setSector($sector)
    {
        $this->sector = $sector;
    
        return $this;
    }

    /**
     * Get sector
     *
     * @return string 
     */
    public function getSector()
    {
        return $this->sector;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return FExperiencias
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
     * @return FExperiencias
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
     * @return FExperiencias
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
     * @return FExperiencias
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
     * @return FExperiencias
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
     * Set idExperienciasP
     *
     * @param integer $idExperienciasP
     * @return FExperiencias
     */
    public function setIdExperienciasP($idExperienciasP)
    {
        $this->idExperienciasP = $idExperienciasP;
    
        return $this;
    }

    /**
     * Get idExperienciasP
     *
     * @return integer 
     */
    public function getIdExperienciasP()
    {
        return $this->idExperienciasP;
    }

    /**
     * Set prioridadExperiencia
     *
     * @param string $prioridadExperiencia
     * @return FExperiencias
     */
    public function setPrioridadExperiencia($prioridadExperiencia)
    {
        $this->prioridadExperiencia = $prioridadExperiencia;
    
        return $this;
    }

    /**
     * Get prioridadExperiencia
     *
     * @return string 
     */
    public function getPrioridadExperiencia()
    {
        return $this->prioridadExperiencia;
    }

    /**
     * Set idPoai
     *
     * @param \Application\Entity\FPoai $idPoai
     * @return FExperiencias
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