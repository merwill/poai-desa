<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanesPago
 *
 * @ORM\Table(name="planes_pago")
 * @ORM\Entity
 */
class PlanesPago
{
    /**
     * @var string
     *
     * @ORM\Column(name="pp_id", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="planes_pago_pp_id_seq", allocationSize=1, initialValue=1)
     */
    private $ppId;

    /**
     * @var integer
     *
     * @ORM\Column(name="nro_cuota", type="smallint", nullable=true)
     */
    private $nroCuota;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vencimiento", type="date", nullable=true)
     */
    private $vencimiento;

    /**
     * @var float
     *
     * @ORM\Column(name="capital", type="float", nullable=true)
     */
    private $capital;

    /**
     * @var float
     *
     * @ORM\Column(name="saldo", type="float", nullable=true)
     */
    private $saldo;

    /**
     * @var float
     *
     * @ORM\Column(name="intereses", type="float", nullable=true)
     */
    private $intereses;

    /**
     * @var float
     *
     * @ORM\Column(name="cuota", type="float", nullable=true)
     */
    private $cuota;

    /**
     * @var string
     *
     * @ORM\Column(name="autoridad1", type="string", length=50, nullable=true)
     */
    private $autoridad1;

    /**
     * @var string
     *
     * @ORM\Column(name="autoridad2", type="string", length=50, nullable=true)
     */
    private $autoridad2;

    /**
     * @var integer
     *
     * @ORM\Column(name="nro_emision", type="smallint", nullable=true)
     */
    private $nroEmision;

    /**
     * @var string
     *
     * @ORM\Column(name="lit_cuota", type="string", length=100, nullable=true)
     */
    private $litCuota;

    /**
     * @var string
     *
     * @ORM\Column(name="dig_bono_ok", type="string", length=100, nullable=true)
     */
    private $digBonoOk;

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
     * @var \Application\Entity\Creditos
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Creditos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="credito_id", referencedColumnName="credito_id")
     * })
     */
    private $credito;

    /**
     * @var \Application\Entity\Desembolsos
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Desembolsos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="desembolso_id", referencedColumnName="desembolso_id")
     * })
     */
    private $desembolso;

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
     * Get ppId
     *
     * @return string 
     */
    public function getPpId()
    {
        return $this->ppId;
    }

    /**
     * Set nroCuota
     *
     * @param integer $nroCuota
     * @return PlanesPago
     */
    public function setNroCuota($nroCuota)
    {
        $this->nroCuota = $nroCuota;
    
        return $this;
    }

    /**
     * Get nroCuota
     *
     * @return integer 
     */
    public function getNroCuota()
    {
        return $this->nroCuota;
    }

    /**
     * Set vencimiento
     *
     * @param \DateTime $vencimiento
     * @return PlanesPago
     */
    public function setVencimiento($vencimiento)
    {
        $this->vencimiento = $vencimiento;
    
        return $this;
    }

    /**
     * Get vencimiento
     *
     * @return \DateTime 
     */
    public function getVencimiento()
    {
        return $this->vencimiento;
    }

    /**
     * Set capital
     *
     * @param float $capital
     * @return PlanesPago
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    
        return $this;
    }

    /**
     * Get capital
     *
     * @return float 
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set saldo
     *
     * @param float $saldo
     * @return PlanesPago
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    
        return $this;
    }

    /**
     * Get saldo
     *
     * @return float 
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set intereses
     *
     * @param float $intereses
     * @return PlanesPago
     */
    public function setIntereses($intereses)
    {
        $this->intereses = $intereses;
    
        return $this;
    }

    /**
     * Get intereses
     *
     * @return float 
     */
    public function getIntereses()
    {
        return $this->intereses;
    }

    /**
     * Set cuota
     *
     * @param float $cuota
     * @return PlanesPago
     */
    public function setCuota($cuota)
    {
        $this->cuota = $cuota;
    
        return $this;
    }

    /**
     * Get cuota
     *
     * @return float 
     */
    public function getCuota()
    {
        return $this->cuota;
    }

    /**
     * Set autoridad1
     *
     * @param string $autoridad1
     * @return PlanesPago
     */
    public function setAutoridad1($autoridad1)
    {
        $this->autoridad1 = $autoridad1;
    
        return $this;
    }

    /**
     * Get autoridad1
     *
     * @return string 
     */
    public function getAutoridad1()
    {
        return $this->autoridad1;
    }

    /**
     * Set autoridad2
     *
     * @param string $autoridad2
     * @return PlanesPago
     */
    public function setAutoridad2($autoridad2)
    {
        $this->autoridad2 = $autoridad2;
    
        return $this;
    }

    /**
     * Get autoridad2
     *
     * @return string 
     */
    public function getAutoridad2()
    {
        return $this->autoridad2;
    }

    /**
     * Set nroEmision
     *
     * @param integer $nroEmision
     * @return PlanesPago
     */
    public function setNroEmision($nroEmision)
    {
        $this->nroEmision = $nroEmision;
    
        return $this;
    }

    /**
     * Get nroEmision
     *
     * @return integer 
     */
    public function getNroEmision()
    {
        return $this->nroEmision;
    }

    /**
     * Set litCuota
     *
     * @param string $litCuota
     * @return PlanesPago
     */
    public function setLitCuota($litCuota)
    {
        $this->litCuota = $litCuota;
    
        return $this;
    }

    /**
     * Get litCuota
     *
     * @return string 
     */
    public function getLitCuota()
    {
        return $this->litCuota;
    }

    /**
     * Set digBonoOk
     *
     * @param string $digBonoOk
     * @return PlanesPago
     */
    public function setDigBonoOk($digBonoOk)
    {
        $this->digBonoOk = $digBonoOk;
    
        return $this;
    }

    /**
     * Get digBonoOk
     *
     * @return string 
     */
    public function getDigBonoOk()
    {
        return $this->digBonoOk;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return PlanesPago
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
     * @return PlanesPago
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
     * Set credito
     *
     * @param \Application\Entity\Creditos $credito
     * @return PlanesPago
     */
    public function setCredito(\Application\Entity\Creditos $credito = null)
    {
        $this->credito = $credito;
    
        return $this;
    }

    /**
     * Get credito
     *
     * @return \Application\Entity\Creditos 
     */
    public function getCredito()
    {
        return $this->credito;
    }

    /**
     * Set desembolso
     *
     * @param \Application\Entity\Desembolsos $desembolso
     * @return PlanesPago
     */
    public function setDesembolso(\Application\Entity\Desembolsos $desembolso = null)
    {
        $this->desembolso = $desembolso;
    
        return $this;
    }

    /**
     * Get desembolso
     *
     * @return \Application\Entity\Desembolsos 
     */
    public function getDesembolso()
    {
        return $this->desembolso;
    }

    /**
     * Set estado
     *
     * @param \Application\Entity\Estados $estado
     * @return PlanesPago
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
}