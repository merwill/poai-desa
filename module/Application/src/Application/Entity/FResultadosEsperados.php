<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FResultadosEsperados
 *
 * @ORM\Table(name="f_resultados_esperados")
 * @ORM\Entity
 */
class FResultadosEsperados
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_resultados_esperados", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_resultados_esperados_id_resultados_esperados_seq", allocationSize=1, initialValue=1)
     */
    private $idResultadosEsperados;

    /**
     * @var string
     *
     * @ORM\Column(name="nro_operacion", type="string", length=30, nullable=true)
     */
    private $nroOperacion;

    /**
     * @var string
     *
     * @ORM\Column(name="operacion", type="string", length=225, nullable=true)
     */
    private $operacion;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_resultado", type="string", length=30, nullable=true)
     */
    private $tipoResultado;

    /**
     * @var integer
     *
     * @ORM\Column(name="ponderacion_cantidad", type="integer", nullable=true)
     */
    private $ponderacionCantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="ponderacion_oportunidad", type="integer", nullable=true)
     */
    private $ponderacionOportunidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="ponderacion_cualitativa", type="integer", nullable=true)
     */
    private $ponderacionCualitativa;

    /**
     * @var string
     *
     * @ORM\Column(name="medio_verificacion", type="string", length=50, nullable=true)
     */
    private $medioVerificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="ponderacion", type="integer", nullable=true)
     */
    private $ponderacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_ponderacion", type="integer", nullable=true)
     */
    private $totalPonderacion;

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
     * @var \Application\Entity\FPoai
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\FPoai")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_poai", referencedColumnName="id_poai")
     * })
     */
    private $idPoai;



    /**
     * Get idResultadosEsperados
     *
     * @return integer 
     */
    public function getIdResultadosEsperados()
    {
        return $this->idResultadosEsperados;
    }

    /**
     * Set nroOperacion
     *
     * @param string $nroOperacion
     * @return FResultadosEsperados
     */
    public function setNroOperacion($nroOperacion)
    {
        $this->nroOperacion = $nroOperacion;
    
        return $this;
    }

    /**
     * Get nroOperacion
     *
     * @return string 
     */
    public function getNroOperacion()
    {
        return $this->nroOperacion;
    }

    /**
     * Set operacion
     *
     * @param string $operacion
     * @return FResultadosEsperados
     */
    public function setOperacion($operacion)
    {
        $this->operacion = $operacion;
    
        return $this;
    }

    /**
     * Get operacion
     *
     * @return string 
     */
    public function getOperacion()
    {
        return $this->operacion;
    }

    /**
     * Set tipoResultado
     *
     * @param string $tipoResultado
     * @return FResultadosEsperados
     */
    public function setTipoResultado($tipoResultado)
    {
        $this->tipoResultado = $tipoResultado;
    
        return $this;
    }

    /**
     * Get tipoResultado
     *
     * @return string 
     */
    public function getTipoResultado()
    {
        return $this->tipoResultado;
    }

    /**
     * Set ponderacionCantidad
     *
     * @param integer $ponderacionCantidad
     * @return FResultadosEsperados
     */
    public function setPonderacionCantidad($ponderacionCantidad)
    {
        $this->ponderacionCantidad = $ponderacionCantidad;
    
        return $this;
    }

    /**
     * Get ponderacionCantidad
     *
     * @return integer 
     */
    public function getPonderacionCantidad()
    {
        return $this->ponderacionCantidad;
    }

    /**
     * Set ponderacionOportunidad
     *
     * @param integer $ponderacionOportunidad
     * @return FResultadosEsperados
     */
    public function setPonderacionOportunidad($ponderacionOportunidad)
    {
        $this->ponderacionOportunidad = $ponderacionOportunidad;
    
        return $this;
    }

    /**
     * Get ponderacionOportunidad
     *
     * @return integer 
     */
    public function getPonderacionOportunidad()
    {
        return $this->ponderacionOportunidad;
    }

    /**
     * Set ponderacionCualitativa
     *
     * @param integer $ponderacionCualitativa
     * @return FResultadosEsperados
     */
    public function setPonderacionCualitativa($ponderacionCualitativa)
    {
        $this->ponderacionCualitativa = $ponderacionCualitativa;
    
        return $this;
    }

    /**
     * Get ponderacionCualitativa
     *
     * @return integer 
     */
    public function getPonderacionCualitativa()
    {
        return $this->ponderacionCualitativa;
    }

    /**
     * Set medioVerificacion
     *
     * @param string $medioVerificacion
     * @return FResultadosEsperados
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
     * Set ponderacion
     *
     * @param integer $ponderacion
     * @return FResultadosEsperados
     */
    public function setPonderacion($ponderacion)
    {
        $this->ponderacion = $ponderacion;
    
        return $this;
    }

    /**
     * Get ponderacion
     *
     * @return integer 
     */
    public function getPonderacion()
    {
        return $this->ponderacion;
    }

    /**
     * Set totalPonderacion
     *
     * @param integer $totalPonderacion
     * @return FResultadosEsperados
     */
    public function setTotalPonderacion($totalPonderacion)
    {
        $this->totalPonderacion = $totalPonderacion;
    
        return $this;
    }

    /**
     * Get totalPonderacion
     *
     * @return integer 
     */
    public function getTotalPonderacion()
    {
        return $this->totalPonderacion;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return FResultadosEsperados
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
     * @return FResultadosEsperados
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
     * @return FResultadosEsperados
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
     * @return FResultadosEsperados
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
     * Set idPoai
     *
     * @param \Application\Entity\FPoai $idPoai
     * @return FResultadosEsperados
     */
    public function setIdPoai(\Application\Entity\FPoai $idPoai = null)
    {
        $this->idPoai = $idPoai;
    
        return $this;
    }

    /**
     * Get idPoai
     *
     * @return \Application\Entity\FPoai 
     */
    public function getIdPoai()
    {
        return $this->idPoai;
    }
}