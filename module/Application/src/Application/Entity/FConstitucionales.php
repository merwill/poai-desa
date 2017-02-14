<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FConstitucionales
 *
 * @ORM\Table(name="f_constitucionales")
 * @ORM\Entity
 */
class FConstitucionales
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_constitucional", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_constitucionales_id_constitucional_seq", allocationSize=1, initialValue=1)
     */
    private $idConstitucional;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=225, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="modificador", type="string", length=100, nullable=true)
     */
    private $modificador;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_elaboracion", type="datetime", nullable=true)
     */
    private $fechaElaboracion;

    /**
     * @var string
     *
     * @ORM\Column(name="elaborador", type="string", length=100, nullable=true)
     */
    private $elaborador;

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
     * @var string
     *
     * @ORM\Column(name="especificacion", type="string", length=30, nullable=true)
     */
    private $especificacion;

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
     * Get idConstitucional
     *
     * @return integer 
     */
    public function getIdConstitucional()
    {
        return $this->idConstitucional;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return FConstitucionales
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
     * Set modificador
     *
     * @param string $modificador
     * @return FConstitucionales
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
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return FConstitucionales
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
     * Set elaborador
     *
     * @param string $elaborador
     * @return FConstitucionales
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
     * Set estado
     *
     * @param boolean $estado
     * @return FConstitucionales
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
     * @return FConstitucionales
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
     * Set especificacion
     *
     * @param string $especificacion
     * @return FConstitucionales
     */
    public function setEspecificacion($especificacion)
    {
        $this->especificacion = $especificacion;
    
        return $this;
    }

    /**
     * Get especificacion
     *
     * @return string 
     */
    public function getEspecificacion()
    {
        return $this->especificacion;
    }

    /**
     * Set idPoai
     *
     * @param \Application\Entity\FPoai $idPoai
     * @return FConstitucionales
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