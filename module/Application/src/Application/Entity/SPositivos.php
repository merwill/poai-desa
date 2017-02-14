<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SPositivos
 *
 * @ORM\Table(name="s_positivos")
 * @ORM\Entity
 */
class SPositivos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_positivo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="s_positivos_id_positivo_seq", allocationSize=1, initialValue=1)
     */
    private $idPositivo;

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
     * @var string
     *
     * @ORM\Column(name="comportamiento", type="string", length=225, nullable=true)
     */
    private $comportamiento;

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
     * Get idPositivo
     *
     * @return integer 
     */
    public function getIdPositivo()
    {
        return $this->idPositivo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return SPositivos
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
     * @return SPositivos
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
     * Set comportamiento
     *
     * @param string $comportamiento
     * @return SPositivos
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
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return SPositivos
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
     * @return SPositivos
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
     * @return SPositivos
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
     * @return SPositivos
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
     * @return SPositivos
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