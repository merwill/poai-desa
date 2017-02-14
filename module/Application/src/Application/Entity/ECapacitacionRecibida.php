<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ECapacitacionRecibida
 *
 * @ORM\Table(name="e_capacitacion_recibida")
 * @ORM\Entity
 */
class ECapacitacionRecibida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_capacitacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_capacitacion_recibida_id_capacitacion_seq", allocationSize=1, initialValue=1)
     */
    private $idCapacitacion;

    /**
     * @var string
     *
     * @ORM\Column(name="evento", type="string", length=225, nullable=true)
     */
    private $evento;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=225, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="meido_verificacion", type="string", length=225, nullable=true)
     */
    private $meidoVerificacion;

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
     * @var \Application\Entity\EInformeActividades
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EInformeActividades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_informe_actividades", referencedColumnName="id_informe_actividades")
     * })
     */
    private $idInformeActividades;



    /**
     * Get idCapacitacion
     *
     * @return integer 
     */
    public function getIdCapacitacion()
    {
        return $this->idCapacitacion;
    }

    /**
     * Set evento
     *
     * @param string $evento
     * @return ECapacitacionRecibida
     */
    public function setEvento($evento)
    {
        $this->evento = $evento;
    
        return $this;
    }

    /**
     * Get evento
     *
     * @return string 
     */
    public function getEvento()
    {
        return $this->evento;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ECapacitacionRecibida
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
     * Set meidoVerificacion
     *
     * @param string $meidoVerificacion
     * @return ECapacitacionRecibida
     */
    public function setMeidoVerificacion($meidoVerificacion)
    {
        $this->meidoVerificacion = $meidoVerificacion;
    
        return $this;
    }

    /**
     * Get meidoVerificacion
     *
     * @return string 
     */
    public function getMeidoVerificacion()
    {
        return $this->meidoVerificacion;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return ECapacitacionRecibida
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
     * @return ECapacitacionRecibida
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
     * @return ECapacitacionRecibida
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
     * @return ECapacitacionRecibida
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
     * Set idInformeActividades
     *
     * @param \Application\Entity\EInformeActividades $idInformeActividades
     * @return ECapacitacionRecibida
     */
    public function setIdInformeActividades(\Application\Entity\EInformeActividades $idInformeActividades = null)
    {
        $this->idInformeActividades = $idInformeActividades;
    
        return $this;
    }

    /**
     * Get idInformeActividades
     *
     * @return \Application\Entity\EInformeActividades 
     */
    public function getIdInformeActividades()
    {
        return $this->idInformeActividades;
    }
}