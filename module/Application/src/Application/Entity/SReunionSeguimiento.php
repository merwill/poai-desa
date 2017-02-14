<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SReunionSeguimiento
 *
 * @ORM\Table(name="s_reunion_seguimiento")
 * @ORM\Entity
 */
class SReunionSeguimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_reunion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="s_reunion_seguimiento_id_reunion_seq", allocationSize=1, initialValue=1)
     */
    private $idReunion;

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
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var \Application\Entity\Puesto
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Puesto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nro_item", referencedColumnName="nro_item")
     * })
     */
    private $nroItem;



    /**
     * Get idReunion
     *
     * @return integer 
     */
    public function getIdReunion()
    {
        return $this->idReunion;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return SReunionSeguimiento
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
     * @return SReunionSeguimiento
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
     * @return SReunionSeguimiento
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
     * @return SReunionSeguimiento
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
     * Set estado
     *
     * @param boolean $estado
     * @return SReunionSeguimiento
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
     * Set nroItem
     *
     * @param \Application\Entity\Puesto $nroItem
     * @return SReunionSeguimiento
     */
    public function setNroItem(\Application\Entity\Puesto $nroItem = null)
    {
        $this->nroItem = $nroItem;
    
        return $this;
    }

    /**
     * Get nroItem
     *
     * @return \Application\Entity\Puesto 
     */
    public function getNroItem()
    {
        return $this->nroItem;
    }
}