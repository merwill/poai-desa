<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FObjetivos
 *
 * @ORM\Table(name="f_objetivos")
 * @ORM\Entity
 */
class FObjetivos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_objetivo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_objetivos_id_objetivo_seq", allocationSize=1, initialValue=1)
     */
    private $idObjetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo_a", type="string", length=2500, nullable=true)
     */
    private $objetivoA;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo_b", type="string", length=2500, nullable=true)
     */
    private $objetivoB;

    /**
     * @var string
     *
     * @ORM\Column(name="objetivo_c", type="string", length=2500, nullable=true)
     */
    private $objetivoC;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="elaborador", type="string", length=100, nullable=true)
     */
    private $elaborador;

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
     * @ORM\Column(name="modificador", type="string", length=100, nullable=true)
     */
    private $modificador;

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
     * Get idObjetivo
     *
     * @return integer 
     */
    public function getIdObjetivo()
    {
        return $this->idObjetivo;
    }

    /**
     * Set objetivoA
     *
     * @param string $objetivoA
     * @return FObjetivos
     */
    public function setObjetivoA($objetivoA)
    {
        $this->objetivoA = $objetivoA;
    
        return $this;
    }

    /**
     * Get objetivoA
     *
     * @return string 
     */
    public function getObjetivoA()
    {
        return $this->objetivoA;
    }

    /**
     * Set objetivoB
     *
     * @param string $objetivoB
     * @return FObjetivos
     */
    public function setObjetivoB($objetivoB)
    {
        $this->objetivoB = $objetivoB;
    
        return $this;
    }

    /**
     * Get objetivoB
     *
     * @return string 
     */
    public function getObjetivoB()
    {
        return $this->objetivoB;
    }

    /**
     * Set objetivoC
     *
     * @param string $objetivoC
     * @return FObjetivos
     */
    public function setObjetivoC($objetivoC)
    {
        $this->objetivoC = $objetivoC;
    
        return $this;
    }

    /**
     * Get objetivoC
     *
     * @return string 
     */
    public function getObjetivoC()
    {
        return $this->objetivoC;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return FObjetivos
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
     * Set elaborador
     *
     * @param string $elaborador
     * @return FObjetivos
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
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return FObjetivos
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
     * @return FObjetivos
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
     * Set modificador
     *
     * @param string $modificador
     * @return FObjetivos
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
     * Set idPoai
     *
     * @param \Application\Entity\FPoai $idPoai
     * @return FObjetivos
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