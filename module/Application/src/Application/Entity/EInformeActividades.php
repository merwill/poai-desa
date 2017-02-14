<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EInformeActividades
 *
 * @ORM\Table(name="e_informe_actividades")
 * @ORM\Entity
 */
class EInformeActividades
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_informe_actividades", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_informe_actividades_id_informe_actividades_seq", allocationSize=1, initialValue=1)
     */
    private $idInformeActividades;

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
     * Get idInformeActividades
     *
     * @return integer 
     */
    public function getIdInformeActividades()
    {
        return $this->idInformeActividades;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return EInformeActividades
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
     * @return EInformeActividades
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
     * @return EInformeActividades
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
     * @return EInformeActividades
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
     * @return EInformeActividades
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
     * @return EInformeActividades
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