<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EPorResultados
 *
 * @ORM\Table(name="e_por_resultados")
 * @ORM\Entity
 */
class EPorResultados
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_resultado", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_por_resultados_id_resultado_seq", allocationSize=1, initialValue=1)
     */
    private $idResultado;

    /**
     * @var integer
     *
     * @ORM\Column(name="nro_resultado", type="integer", nullable=true)
     */
    private $nroResultado;

    /**
     * @var integer
     *
     * @ORM\Column(name="podereacion_asignada", type="integer", nullable=true)
     */
    private $podereacionAsignada;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_programada", type="integer", nullable=true)
     */
    private $cantidadProgramada;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_esperada", type="integer", nullable=true)
     */
    private $cantidadEsperada;

    /**
     * @var integer
     *
     * @ORM\Column(name="oportunidad_esperada", type="integer", nullable=true)
     */
    private $oportunidadEsperada;

    /**
     * @var integer
     *
     * @ORM\Column(name="indicador_esperado", type="integer", nullable=true)
     */
    private $indicadorEsperado;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad_realizada", type="integer", nullable=true)
     */
    private $cantidadRealizada;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacion_cantidad_obtenida", type="integer", nullable=true)
     */
    private $calificacionCantidadObtenida;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacion_oportunidad_obtenida", type="bigint", nullable=true)
     */
    private $calificacionOportunidadObtenida;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacion_indicador_obtenida", type="integer", nullable=true)
     */
    private $calificacionIndicadorObtenida;

    /**
     * @var integer
     *
     * @ORM\Column(name="calificacion_resultado_obtenido", type="integer", nullable=true)
     */
    private $calificacionResultadoObtenido;

    /**
     * @var integer
     *
     * @ORM\Column(name="resultado_pocentual_obtenido", type="bigint", nullable=true)
     */
    private $resultadoPocentualObtenido;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntaje_final", type="integer", nullable=true)
     */
    private $puntajeFinal;

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
     * @var \Application\Entity\EEvaluacion
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EEvaluacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evaluacion", referencedColumnName="id_evaluacion")
     * })
     */
    private $idEvaluacion;



    /**
     * Get idResultado
     *
     * @return integer 
     */
    public function getIdResultado()
    {
        return $this->idResultado;
    }

    /**
     * Set nroResultado
     *
     * @param integer $nroResultado
     * @return EPorResultados
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
     * Set podereacionAsignada
     *
     * @param integer $podereacionAsignada
     * @return EPorResultados
     */
    public function setPodereacionAsignada($podereacionAsignada)
    {
        $this->podereacionAsignada = $podereacionAsignada;
    
        return $this;
    }

    /**
     * Get podereacionAsignada
     *
     * @return integer 
     */
    public function getPodereacionAsignada()
    {
        return $this->podereacionAsignada;
    }

    /**
     * Set cantidadProgramada
     *
     * @param integer $cantidadProgramada
     * @return EPorResultados
     */
    public function setCantidadProgramada($cantidadProgramada)
    {
        $this->cantidadProgramada = $cantidadProgramada;
    
        return $this;
    }

    /**
     * Get cantidadProgramada
     *
     * @return integer 
     */
    public function getCantidadProgramada()
    {
        return $this->cantidadProgramada;
    }

    /**
     * Set cantidadEsperada
     *
     * @param integer $cantidadEsperada
     * @return EPorResultados
     */
    public function setCantidadEsperada($cantidadEsperada)
    {
        $this->cantidadEsperada = $cantidadEsperada;
    
        return $this;
    }

    /**
     * Get cantidadEsperada
     *
     * @return integer 
     */
    public function getCantidadEsperada()
    {
        return $this->cantidadEsperada;
    }

    /**
     * Set oportunidadEsperada
     *
     * @param integer $oportunidadEsperada
     * @return EPorResultados
     */
    public function setOportunidadEsperada($oportunidadEsperada)
    {
        $this->oportunidadEsperada = $oportunidadEsperada;
    
        return $this;
    }

    /**
     * Get oportunidadEsperada
     *
     * @return integer 
     */
    public function getOportunidadEsperada()
    {
        return $this->oportunidadEsperada;
    }

    /**
     * Set indicadorEsperado
     *
     * @param integer $indicadorEsperado
     * @return EPorResultados
     */
    public function setIndicadorEsperado($indicadorEsperado)
    {
        $this->indicadorEsperado = $indicadorEsperado;
    
        return $this;
    }

    /**
     * Get indicadorEsperado
     *
     * @return integer 
     */
    public function getIndicadorEsperado()
    {
        return $this->indicadorEsperado;
    }

    /**
     * Set cantidadRealizada
     *
     * @param integer $cantidadRealizada
     * @return EPorResultados
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
     * Set calificacionCantidadObtenida
     *
     * @param integer $calificacionCantidadObtenida
     * @return EPorResultados
     */
    public function setCalificacionCantidadObtenida($calificacionCantidadObtenida)
    {
        $this->calificacionCantidadObtenida = $calificacionCantidadObtenida;
    
        return $this;
    }

    /**
     * Get calificacionCantidadObtenida
     *
     * @return integer 
     */
    public function getCalificacionCantidadObtenida()
    {
        return $this->calificacionCantidadObtenida;
    }

    /**
     * Set calificacionOportunidadObtenida
     *
     * @param integer $calificacionOportunidadObtenida
     * @return EPorResultados
     */
    public function setCalificacionOportunidadObtenida($calificacionOportunidadObtenida)
    {
        $this->calificacionOportunidadObtenida = $calificacionOportunidadObtenida;
    
        return $this;
    }

    /**
     * Get calificacionOportunidadObtenida
     *
     * @return integer 
     */
    public function getCalificacionOportunidadObtenida()
    {
        return $this->calificacionOportunidadObtenida;
    }

    /**
     * Set calificacionIndicadorObtenida
     *
     * @param integer $calificacionIndicadorObtenida
     * @return EPorResultados
     */
    public function setCalificacionIndicadorObtenida($calificacionIndicadorObtenida)
    {
        $this->calificacionIndicadorObtenida = $calificacionIndicadorObtenida;
    
        return $this;
    }

    /**
     * Get calificacionIndicadorObtenida
     *
     * @return integer 
     */
    public function getCalificacionIndicadorObtenida()
    {
        return $this->calificacionIndicadorObtenida;
    }

    /**
     * Set calificacionResultadoObtenido
     *
     * @param integer $calificacionResultadoObtenido
     * @return EPorResultados
     */
    public function setCalificacionResultadoObtenido($calificacionResultadoObtenido)
    {
        $this->calificacionResultadoObtenido = $calificacionResultadoObtenido;
    
        return $this;
    }

    /**
     * Get calificacionResultadoObtenido
     *
     * @return integer 
     */
    public function getCalificacionResultadoObtenido()
    {
        return $this->calificacionResultadoObtenido;
    }

    /**
     * Set resultadoPocentualObtenido
     *
     * @param integer $resultadoPocentualObtenido
     * @return EPorResultados
     */
    public function setResultadoPocentualObtenido($resultadoPocentualObtenido)
    {
        $this->resultadoPocentualObtenido = $resultadoPocentualObtenido;
    
        return $this;
    }

    /**
     * Get resultadoPocentualObtenido
     *
     * @return integer 
     */
    public function getResultadoPocentualObtenido()
    {
        return $this->resultadoPocentualObtenido;
    }

    /**
     * Set puntajeFinal
     *
     * @param integer $puntajeFinal
     * @return EPorResultados
     */
    public function setPuntajeFinal($puntajeFinal)
    {
        $this->puntajeFinal = $puntajeFinal;
    
        return $this;
    }

    /**
     * Get puntajeFinal
     *
     * @return integer 
     */
    public function getPuntajeFinal()
    {
        return $this->puntajeFinal;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return EPorResultados
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
     * @return EPorResultados
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
     * @return EPorResultados
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
     * @return EPorResultados
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
     * Set idEvaluacion
     *
     * @param \Application\Entity\EEvaluacion $idEvaluacion
     * @return EPorResultados
     */
    public function setIdEvaluacion(\Application\Entity\EEvaluacion $idEvaluacion = null)
    {
        $this->idEvaluacion = $idEvaluacion;
    
        return $this;
    }

    /**
     * Get idEvaluacion
     *
     * @return \Application\Entity\EEvaluacion 
     */
    public function getIdEvaluacion()
    {
        return $this->idEvaluacion;
    }
}