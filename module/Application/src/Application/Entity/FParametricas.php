<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FParametricas
 *
 * @ORM\Table(name="f_parametricas")
 * @ORM\Entity
 */
class FParametricas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_parametricas", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_parametricas_id_parametricas_seq", allocationSize=1, initialValue=1)
     */
    private $idParametricas;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_maestro", type="integer", nullable=false)
     */
    private $idMaestro;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=30, nullable=false)
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
     * Get idParametricas
     *
     * @return integer 
     */
    public function getIdParametricas()
    {
        return $this->idParametricas;
    }

    /**
     * Set idMaestro
     *
     * @param integer $idMaestro
     * @return FParametricas
     */
    public function setIdMaestro($idMaestro)
    {
        $this->idMaestro = $idMaestro;
    
        return $this;
    }

    /**
     * Get idMaestro
     *
     * @return integer 
     */
    public function getIdMaestro()
    {
        return $this->idMaestro;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return FParametricas
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
     * @param string $estado
     * @return FParametricas
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return FParametricas
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
     * @return FParametricas
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
     * @return FParametricas
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
     * @return FParametricas
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
}