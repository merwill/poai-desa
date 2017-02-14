<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SNegativos
 *
 * @ORM\Table(name="s_negativos")
 * @ORM\Entity
 */
class SNegativos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_negativo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="s_negativos_id_negativo_seq", allocationSize=1, initialValue=1)
     */
    private $idNegativo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=225, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="causas", type="bigint", nullable=true)
     */
    private $causas;

    /**
     * @var string
     *
     * @ORM\Column(name="acciones", type="string", length=225, nullable=true)
     */
    private $acciones;

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
     * @var \Application\Entity\SAcontecimientosNotables
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\SAcontecimientosNotables")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_acontecimiento", referencedColumnName="id_acontecimiento")
     * })
     */
    private $idAcontecimiento;



    /**
     * Get idNegativo
     *
     * @return integer 
     */
    public function getIdNegativo()
    {
        return $this->idNegativo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return SNegativos
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return SNegativos
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
     * Set causas
     *
     * @param integer $causas
     * @return SNegativos
     */
    public function setCausas($causas)
    {
        $this->causas = $causas;
    
        return $this;
    }

    /**
     * Get causas
     *
     * @return integer 
     */
    public function getCausas()
    {
        return $this->causas;
    }

    /**
     * Set acciones
     *
     * @param string $acciones
     * @return SNegativos
     */
    public function setAcciones($acciones)
    {
        $this->acciones = $acciones;
    
        return $this;
    }

    /**
     * Get acciones
     *
     * @return string 
     */
    public function getAcciones()
    {
        return $this->acciones;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return SNegativos
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
     * @return SNegativos
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
     * @return SNegativos
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
     * @return SNegativos
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
     * Set idAcontecimiento
     *
     * @param \Application\Entity\SAcontecimientosNotables $idAcontecimiento
     * @return SNegativos
     */
    public function setIdAcontecimiento(\Application\Entity\SAcontecimientosNotables $idAcontecimiento = null)
    {
        $this->idAcontecimiento = $idAcontecimiento;
    
        return $this;
    }

    /**
     * Get idAcontecimiento
     *
     * @return \Application\Entity\SAcontecimientosNotables 
     */
    public function getIdAcontecimiento()
    {
        return $this->idAcontecimiento;
    }
}