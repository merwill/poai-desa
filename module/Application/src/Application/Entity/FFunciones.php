<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FFunciones
 *
 * @ORM\Table(name="f_funciones")
 * @ORM\Entity
 */
class FFunciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_funcion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_funciones_id_funcion_seq", allocationSize=1, initialValue=1)
     */
    private $idFuncion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=225, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="especificacion", type="string", length=100, nullable=true)
     */
    private $especificacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

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
     * @var integer
     *
     * @ORM\Column(name="id_funciones_p", type="integer", nullable=true)
     */
    private $idFuncionesP;

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
     * Get idFuncion
     *
     * @return integer 
     */
    public function getIdFuncion()
    {
        return $this->idFuncion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return FFunciones
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
     * Set especificacion
     *
     * @param string $especificacion
     * @return FFunciones
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
     * Set estado
     *
     * @param boolean $estado
     * @return FFunciones
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
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return FFunciones
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
     * @return FFunciones
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
     * @return FFunciones
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
     * @return FFunciones
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
     * Set idFuncionesP
     *
     * @param integer $idFuncionesP
     * @return FFunciones
     */
    public function setIdFuncionesP($idFuncionesP)
    {
        $this->idFuncionesP = $idFuncionesP;
    
        return $this;
    }

    /**
     * Get idFuncionesP
     *
     * @return integer 
     */
    public function getIdFuncionesP()
    {
        return $this->idFuncionesP;
    }

    /**
     * Set idPoai
     *
     * @param \Application\Entity\FPoai $idPoai
     * @return FFunciones
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