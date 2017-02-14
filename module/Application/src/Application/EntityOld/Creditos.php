<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Creditos
 *
 * @ORM\Table(name="creditos")
 * @ORM\Entity
 */
class Creditos
{
    /**
     * @var string
     *
     * @ORM\Column(name="credito_id", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="creditos_credito_id_seq", allocationSize=1, initialValue=1)
     */
    private $creditoId;

    /**
     * @var integer
     *
     * @ORM\Column(name="correlativo", type="smallint", nullable=true)
     */
    private $correlativo;

    /**
     * @var integer
     *
     * @ORM\Column(name="cant_desembolsos", type="smallint", nullable=true)
     */
    private $cantDesembolsos;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_credito", type="float", nullable=true)
     */
    private $montoCredito;

    /**
     * @var integer
     *
     * @ORM\Column(name="plazo", type="integer", nullable=true)
     */
    private $plazo;

    /**
     * @var float
     *
     * @ORM\Column(name="taza_interes", type="float", nullable=true)
     */
    private $tazaInteres;

    /**
     * @var integer
     *
     * @ORM\Column(name="periodo_gracia", type="smallint", nullable=true)
     */
    private $periodoGracia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_contrato", type="date", nullable=true)
     */
    private $fechaContrato;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_limite", type="date", nullable=true)
     */
    private $fechaLimite;

    /**
     * @var string
     *
     * @ORM\Column(name="cite_autorizacion", type="string", length=30, nullable=true)
     */
    private $citeAutorizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="dig_contrato", type="string", length=100, nullable=true)
     */
    private $digContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=30, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=15, nullable=true)
     */
    private $ip;

    /**
     * @var \Application\Entity\Entidades
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Entidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entidad_id", referencedColumnName="entidad_id")
     * })
     */
    private $entidad;

    /**
     * @var \Application\Entity\Entidades
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Entidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entidad_prestamista", referencedColumnName="entidad_id")
     * })
     */
    private $entidadPrestamista;

    /**
     * @var \Application\Entity\Estados
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Estados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_id", referencedColumnName="estado_id")
     * })
     */
    private $estado;

    /**
     * @var \Application\Entity\TiposBonos
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\TiposBonos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_id", referencedColumnName="tipo_id")
     * })
     */
    private $tipo;



    /**
     * Get creditoId
     *
     * @return string 
     */
    public function getCreditoId()
    {
        return $this->creditoId;
    }

    /**
     * Set correlativo
     *
     * @param integer $correlativo
     * @return Creditos
     */
    public function setCorrelativo($correlativo)
    {
        $this->correlativo = $correlativo;
    
        return $this;
    }

    /**
     * Get correlativo
     *
     * @return integer 
     */
    public function getCorrelativo()
    {
        return $this->correlativo;
    }

    /**
     * Set cantDesembolsos
     *
     * @param integer $cantDesembolsos
     * @return Creditos
     */
    public function setCantDesembolsos($cantDesembolsos)
    {
        $this->cantDesembolsos = $cantDesembolsos;
    
        return $this;
    }

    /**
     * Get cantDesembolsos
     *
     * @return integer 
     */
    public function getCantDesembolsos()
    {
        return $this->cantDesembolsos;
    }

    /**
     * Set montoCredito
     *
     * @param float $montoCredito
     * @return Creditos
     */
    public function setMontoCredito($montoCredito)
    {
        $this->montoCredito = $montoCredito;
    
        return $this;
    }

    /**
     * Get montoCredito
     *
     * @return float 
     */
    public function getMontoCredito()
    {
        return $this->montoCredito;
    }

    /**
     * Set plazo
     *
     * @param integer $plazo
     * @return Creditos
     */
    public function setPlazo($plazo)
    {
        $this->plazo = $plazo;
    
        return $this;
    }

    /**
     * Get plazo
     *
     * @return integer 
     */
    public function getPlazo()
    {
        return $this->plazo;
    }

    /**
     * Set tazaInteres
     *
     * @param float $tazaInteres
     * @return Creditos
     */
    public function setTazaInteres($tazaInteres)
    {
        $this->tazaInteres = $tazaInteres;
    
        return $this;
    }

    /**
     * Get tazaInteres
     *
     * @return float 
     */
    public function getTazaInteres()
    {
        return $this->tazaInteres;
    }

    /**
     * Set periodoGracia
     *
     * @param integer $periodoGracia
     * @return Creditos
     */
    public function setPeriodoGracia($periodoGracia)
    {
        $this->periodoGracia = $periodoGracia;
    
        return $this;
    }

    /**
     * Get periodoGracia
     *
     * @return integer 
     */
    public function getPeriodoGracia()
    {
        return $this->periodoGracia;
    }

    /**
     * Set fechaContrato
     *
     * @param \DateTime $fechaContrato
     * @return Creditos
     */
    public function setFechaContrato($fechaContrato)
    {
        $this->fechaContrato = $fechaContrato;
    
        return $this;
    }

    /**
     * Get fechaContrato
     *
     * @return \DateTime 
     */
    public function getFechaContrato()
    {
        return $this->fechaContrato;
    }

    /**
     * Set fechaLimite
     *
     * @param \DateTime $fechaLimite
     * @return Creditos
     */
    public function setFechaLimite($fechaLimite)
    {
        $this->fechaLimite = $fechaLimite;
    
        return $this;
    }

    /**
     * Get fechaLimite
     *
     * @return \DateTime 
     */
    public function getFechaLimite()
    {
        return $this->fechaLimite;
    }

    /**
     * Set citeAutorizacion
     *
     * @param string $citeAutorizacion
     * @return Creditos
     */
    public function setCiteAutorizacion($citeAutorizacion)
    {
        $this->citeAutorizacion = $citeAutorizacion;
    
        return $this;
    }

    /**
     * Get citeAutorizacion
     *
     * @return string 
     */
    public function getCiteAutorizacion()
    {
        return $this->citeAutorizacion;
    }

    /**
     * Set digContrato
     *
     * @param string $digContrato
     * @return Creditos
     */
    public function setDigContrato($digContrato)
    {
        $this->digContrato = $digContrato;
    
        return $this;
    }

    /**
     * Get digContrato
     *
     * @return string 
     */
    public function getDigContrato()
    {
        return $this->digContrato;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Creditos
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Creditos
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set entidad
     *
     * @param \Application\Entity\Entidades $entidad
     * @return Creditos
     */
    public function setEntidad(\Application\Entity\Entidades $entidad = null)
    {
        $this->entidad = $entidad;
    
        return $this;
    }

    /**
     * Get entidad
     *
     * @return \Application\Entity\Entidades 
     */
    public function getEntidad()
    {
        return $this->entidad;
    }

    /**
     * Set entidadPrestamista
     *
     * @param \Application\Entity\Entidades $entidadPrestamista
     * @return Creditos
     */
    public function setEntidadPrestamista(\Application\Entity\Entidades $entidadPrestamista = null)
    {
        $this->entidadPrestamista = $entidadPrestamista;
    
        return $this;
    }

    /**
     * Get entidadPrestamista
     *
     * @return \Application\Entity\Entidades 
     */
    public function getEntidadPrestamista()
    {
        return $this->entidadPrestamista;
    }

    /**
     * Set estado
     *
     * @param \Application\Entity\Estados $estado
     * @return Creditos
     */
    public function setEstado(\Application\Entity\Estados $estado = null)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return \Application\Entity\Estados 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set tipo
     *
     * @param \Application\Entity\TiposBonos $tipo
     * @return Creditos
     */
    public function setTipo(\Application\Entity\TiposBonos $tipo = null)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Application\Entity\TiposBonos 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}