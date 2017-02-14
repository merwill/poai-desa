<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ENecesidadCapacitacion
 *
 * @ORM\Table(name="e_necesidad_capacitacion")
 * @ORM\Entity
 */
class ENecesidadCapacitacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_necesidad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_necesidad_capacitacion_id_necesidad_seq", allocationSize=1, initialValue=1)
     */
    private $idNecesidad;

    /**
     * @var string
     *
     * @ORM\Column(name="funciones", type="string", length=100, nullable=true)
     */
    private $funciones;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacion_tema", type="string", length=225, nullable=true)
     */
    private $denominacionTema;

    /**
     * @var string
     *
     * @ORM\Column(name="profundidad", type="string", length=50, nullable=true)
     */
    private $profundidad;

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
     * Get idNecesidad
     *
     * @return integer 
     */
    public function getIdNecesidad()
    {
        return $this->idNecesidad;
    }

    /**
     * Set funciones
     *
     * @param string $funciones
     * @return ENecesidadCapacitacion
     */
    public function setFunciones($funciones)
    {
        $this->funciones = $funciones;
    
        return $this;
    }

    /**
     * Get funciones
     *
     * @return string 
     */
    public function getFunciones()
    {
        return $this->funciones;
    }

    /**
     * Set denominacionTema
     *
     * @param string $denominacionTema
     * @return ENecesidadCapacitacion
     */
    public function setDenominacionTema($denominacionTema)
    {
        $this->denominacionTema = $denominacionTema;
    
        return $this;
    }

    /**
     * Get denominacionTema
     *
     * @return string 
     */
    public function getDenominacionTema()
    {
        return $this->denominacionTema;
    }

    /**
     * Set profundidad
     *
     * @param string $profundidad
     * @return ENecesidadCapacitacion
     */
    public function setProfundidad($profundidad)
    {
        $this->profundidad = $profundidad;
    
        return $this;
    }

    /**
     * Get profundidad
     *
     * @return string 
     */
    public function getProfundidad()
    {
        return $this->profundidad;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return ENecesidadCapacitacion
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
     * @return ENecesidadCapacitacion
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
     * @return ENecesidadCapacitacion
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
     * @return ENecesidadCapacitacion
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
     * @return ENecesidadCapacitacion
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