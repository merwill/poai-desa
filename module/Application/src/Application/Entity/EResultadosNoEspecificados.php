<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EResultadosNoEspecificados
 *
 * @ORM\Table(name="e_resultados_no_especificados")
 * @ORM\Entity
 */
class EResultadosNoEspecificados
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_capacitacion_recibida", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_resultados_no_especificados_id_capacitacion_recibida_seq", allocationSize=1, initialValue=1)
     */
    private $idCapacitacionRecibida;

    /**
     * @var integer
     *
     * @ORM\Column(name="nro_resultado", type="integer", nullable=true)
     */
    private $nroResultado;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_resultado", type="string", length=225, nullable=true)
     */
    private $descripcionResultado;

    /**
     * @var integer
     *
     * @ORM\Column(name="desc_cantidad", type="integer", nullable=true)
     */
    private $descCantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_oportunidad", type="string", length=225, nullable=true)
     */
    private $descOportunidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="desc_fecha_inicio", type="datetime", nullable=true)
     */
    private $descFechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="desc_fecha_fin", type="datetime", nullable=true)
     */
    private $descFechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="medio_verificacion", type="string", length=225, nullable=true)
     */
    private $medioVerificacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="recursos_asignados", type="boolean", nullable=true)
     */
    private $recursosAsignados;

    /**
     * @var string
     *
     * @ORM\Column(name="comentarios", type="string", length=225, nullable=true)
     */
    private $comentarios;

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
     * Get idCapacitacionRecibida
     *
     * @return integer 
     */
    public function getIdCapacitacionRecibida()
    {
        return $this->idCapacitacionRecibida;
    }

    /**
     * Set nroResultado
     *
     * @param integer $nroResultado
     * @return EResultadosNoEspecificados
     */
    public function setNroResultado($nroResultado)
    {
        $this->nroResultado = $nroResultado;
    
        return $this;
    }

    /**
     * Get nroResultado
     *
     * @return integer 
     */
    public function getNroResultado()
    {
        return $this->nroResultado;
    }

    /**
     * Set descripcionResultado
     *
     * @param string $descripcionResultado
     * @return EResultadosNoEspecificados
     */
    public function setDescripcionResultado($descripcionResultado)
    {
        $this->descripcionResultado = $descripcionResultado;
    
        return $this;
    }

    /**
     * Get descripcionResultado
     *
     * @return string 
     */
    public function getDescripcionResultado()
    {
        return $this->descripcionResultado;
    }

    /**
     * Set descCantidad
     *
     * @param integer $descCantidad
     * @return EResultadosNoEspecificados
     */
    public function setDescCantidad($descCantidad)
    {
        $this->descCantidad = $descCantidad;
    
        return $this;
    }

    /**
     * Get descCantidad
     *
     * @return integer 
     */
    public function getDescCantidad()
    {
        return $this->descCantidad;
    }

    /**
     * Set descOportunidad
     *
     * @param string $descOportunidad
     * @return EResultadosNoEspecificados
     */
    public function setDescOportunidad($descOportunidad)
    {
        $this->descOportunidad = $descOportunidad;
    
        return $this;
    }

    /**
     * Get descOportunidad
     *
     * @return string 
     */
    public function getDescOportunidad()
    {
        return $this->descOportunidad;
    }

    /**
     * Set descFechaInicio
     *
     * @param \DateTime $descFechaInicio
     * @return EResultadosNoEspecificados
     */
    public function setDescFechaInicio($descFechaInicio)
    {
        $this->descFechaInicio = $descFechaInicio;
    
        return $this;
    }

    /**
     * Get descFechaInicio
     *
     * @return \DateTime 
     */
    public function getDescFechaInicio()
    {
        return $this->descFechaInicio;
    }

    /**
     * Set descFechaFin
     *
     * @param \DateTime $descFechaFin
     * @return EResultadosNoEspecificados
     */
    public function setDescFechaFin($descFechaFin)
    {
        $this->descFechaFin = $descFechaFin;
    
        return $this;
    }

    /**
     * Get descFechaFin
     *
     * @return \DateTime 
     */
    public function getDescFechaFin()
    {
        return $this->descFechaFin;
    }

    /**
     * Set medioVerificacion
     *
     * @param string $medioVerificacion
     * @return EResultadosNoEspecificados
     */
    public function setMedioVerificacion($medioVerificacion)
    {
        $this->medioVerificacion = $medioVerificacion;
    
        return $this;
    }

    /**
     * Get medioVerificacion
     *
     * @return string 
     */
    public function getMedioVerificacion()
    {
        return $this->medioVerificacion;
    }

    /**
     * Set recursosAsignados
     *
     * @param boolean $recursosAsignados
     * @return EResultadosNoEspecificados
     */
    public function setRecursosAsignados($recursosAsignados)
    {
        $this->recursosAsignados = $recursosAsignados;
    
        return $this;
    }

    /**
     * Get recursosAsignados
     *
     * @return boolean 
     */
    public function getRecursosAsignados()
    {
        return $this->recursosAsignados;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return EResultadosNoEspecificados
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    
        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return EResultadosNoEspecificados
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
     * @return EResultadosNoEspecificados
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
     * @return EResultadosNoEspecificados
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
     * @return EResultadosNoEspecificados
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
     * @return EResultadosNoEspecificados
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