<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ECumplimientoResultadosPoai
 *
 * @ORM\Table(name="e_cumplimiento_resultados_poai")
 * @ORM\Entity
 */
class ECumplimientoResultadosPoai
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cumplimiento_resultados", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_cumplimiento_resultados_poai_id_cumplimiento_resultados_seq", allocationSize=1, initialValue=1)
     */
    private $idCumplimientoResultados;

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
     * @ORM\Column(name="cantidad_realizada", type="integer", nullable=true)
     */
    private $cantidadRealizada;

    /**
     * @var string
     *
     * @ORM\Column(name="oportunidad_alcanzada", type="string", length=225, nullable=true)
     */
    private $oportunidadAlcanzada;

    /**
     * @var integer
     *
     * @ORM\Column(name="indicador_cualitativo_alcanzado", type="integer", nullable=true)
     */
    private $indicadorCualitativoAlcanzado;

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
     * Get idCumplimientoResultados
     *
     * @return integer 
     */
    public function getIdCumplimientoResultados()
    {
        return $this->idCumplimientoResultados;
    }

    /**
     * Set nroResultado
     *
     * @param integer $nroResultado
     * @return ECumplimientoResultadosPoai
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
     * @return ECumplimientoResultadosPoai
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
     * Set cantidadRealizada
     *
     * @param integer $cantidadRealizada
     * @return ECumplimientoResultadosPoai
     */
    public function setCantidadRealizada($cantidadRealizada)
    {
        $this->cantidadRealizada = $cantidadRealizada;
    
        return $this;
    }

    /**
     * Get cantidadRealizada
     *
     * @return integer 
     */
    public function getCantidadRealizada()
    {
        return $this->cantidadRealizada;
    }

    /**
     * Set oportunidadAlcanzada
     *
     * @param string $oportunidadAlcanzada
     * @return ECumplimientoResultadosPoai
     */
    public function setOportunidadAlcanzada($oportunidadAlcanzada)
    {
        $this->oportunidadAlcanzada = $oportunidadAlcanzada;
    
        return $this;
    }

    /**
     * Get oportunidadAlcanzada
     *
     * @return string 
     */
    public function getOportunidadAlcanzada()
    {
        return $this->oportunidadAlcanzada;
    }

    /**
     * Set indicadorCualitativoAlcanzado
     *
     * @param integer $indicadorCualitativoAlcanzado
     * @return ECumplimientoResultadosPoai
     */
    public function setIndicadorCualitativoAlcanzado($indicadorCualitativoAlcanzado)
    {
        $this->indicadorCualitativoAlcanzado = $indicadorCualitativoAlcanzado;
    
        return $this;
    }

    /**
     * Get indicadorCualitativoAlcanzado
     *
     * @return integer 
     */
    public function getIndicadorCualitativoAlcanzado()
    {
        return $this->indicadorCualitativoAlcanzado;
    }

    /**
     * Set medioVerificacion
     *
     * @param string $medioVerificacion
     * @return ECumplimientoResultadosPoai
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
     * @return ECumplimientoResultadosPoai
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
     * @return ECumplimientoResultadosPoai
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
     * @return ECumplimientoResultadosPoai
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
     * @return ECumplimientoResultadosPoai
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
     * @return ECumplimientoResultadosPoai
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
     * @return ECumplimientoResultadosPoai
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
     * @return ECumplimientoResultadosPoai
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