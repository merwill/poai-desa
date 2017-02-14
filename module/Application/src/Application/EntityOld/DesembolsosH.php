<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DesembolsosH
 *
 * @ORM\Table(name="desembolsos_h")
 * @ORM\Entity
 */
class DesembolsosH
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_desembolso_h", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="desembolsos_h_id_desembolso_h_seq", allocationSize=1, initialValue=1)
     */
    private $idDesembolsoH;

    /**
     * @var string
     *
     * @ORM\Column(name="desembolso_id", type="string", length=30, nullable=true)
     */
    private $desembolsoId;

    /**
     * @var string
     *
     * @ORM\Column(name="desembolso", type="string", length=5, nullable=true)
     */
    private $desembolso;

    /**
     * @var integer
     *
     * @ORM\Column(name="nro_desembolso", type="smallint", nullable=true)
     */
    private $nroDesembolso;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_desembolso", type="float", nullable=true)
     */
    private $montoDesembolso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_desembolso", type="date", nullable=true)
     */
    private $fechaDesembolso;

    /**
     * @var string
     *
     * @ORM\Column(name="cite_desembolso", type="string", length=30, nullable=true)
     */
    private $citeDesembolso;

    /**
     * @var string
     *
     * @ORM\Column(name="dig_bonos", type="string", length=100, nullable=true)
     */
    private $digBonos;

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
     * @var \Application\Entity\Acciones
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Acciones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="accion_id", referencedColumnName="accion_id")
     * })
     */
    private $accion;

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
     * @var \Application\Entity\Estados
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Estados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_id", referencedColumnName="estado_id")
     * })
     */
    private $estado;

    /**
     * @var \Application\Entity\PistasAuditoria
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\PistasAuditoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pista_id", referencedColumnName="pista_id")
     * })
     */
    private $pista;



    /**
     * Get idDesembolsoH
     *
     * @return integer 
     */
    public function getIdDesembolsoH()
    {
        return $this->idDesembolsoH;
    }

    /**
     * Set desembolsoId
     *
     * @param string $desembolsoId
     * @return DesembolsosH
     */
    public function setDesembolsoId($desembolsoId)
    {
        $this->desembolsoId = $desembolsoId;
    
        return $this;
    }

    /**
     * Get desembolsoId
     *
     * @return string 
     */
    public function getDesembolsoId()
    {
        return $this->desembolsoId;
    }

    /**
     * Set desembolso
     *
     * @param string $desembolso
     * @return DesembolsosH
     */
    public function setDesembolso($desembolso)
    {
        $this->desembolso = $desembolso;
    
        return $this;
    }

    /**
     * Get desembolso
     *
     * @return string 
     */
    public function getDesembolso()
    {
        return $this->desembolso;
    }

    /**
     * Set nroDesembolso
     *
     * @param integer $nroDesembolso
     * @return DesembolsosH
     */
    public function setNroDesembolso($nroDesembolso)
    {
        $this->nroDesembolso = $nroDesembolso;
    
        return $this;
    }

    /**
     * Get nroDesembolso
     *
     * @return integer 
     */
    public function getNroDesembolso()
    {
        return $this->nroDesembolso;
    }

    /**
     * Set montoDesembolso
     *
     * @param float $montoDesembolso
     * @return DesembolsosH
     */
    public function setMontoDesembolso($montoDesembolso)
    {
        $this->montoDesembolso = $montoDesembolso;
    
        return $this;
    }

    /**
     * Get montoDesembolso
     *
     * @return float 
     */
    public function getMontoDesembolso()
    {
        return $this->montoDesembolso;
    }

    /**
     * Set fechaDesembolso
     *
     * @param \DateTime $fechaDesembolso
     * @return DesembolsosH
     */
    public function setFechaDesembolso($fechaDesembolso)
    {
        $this->fechaDesembolso = $fechaDesembolso;
    
        return $this;
    }

    /**
     * Get fechaDesembolso
     *
     * @return \DateTime 
     */
    public function getFechaDesembolso()
    {
        return $this->fechaDesembolso;
    }

    /**
     * Set citeDesembolso
     *
     * @param string $citeDesembolso
     * @return DesembolsosH
     */
    public function setCiteDesembolso($citeDesembolso)
    {
        $this->citeDesembolso = $citeDesembolso;
    
        return $this;
    }

    /**
     * Get citeDesembolso
     *
     * @return string 
     */
    public function getCiteDesembolso()
    {
        return $this->citeDesembolso;
    }

    /**
     * Set digBonos
     *
     * @param string $digBonos
     * @return DesembolsosH
     */
    public function setDigBonos($digBonos)
    {
        $this->digBonos = $digBonos;
    
        return $this;
    }

    /**
     * Get digBonos
     *
     * @return string 
     */
    public function getDigBonos()
    {
        return $this->digBonos;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return DesembolsosH
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
     * @return DesembolsosH
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
     * Set accion
     *
     * @param \Application\Entity\Acciones $accion
     * @return DesembolsosH
     */
    public function setAccion(\Application\Entity\Acciones $accion = null)
    {
        $this->accion = $accion;
    
        return $this;
    }

    /**
     * Get accion
     *
     * @return \Application\Entity\Acciones 
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set credito
     *
     * @param \Application\Entity\Creditos $credito
     * @return DesembolsosH
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
     * Set estado
     *
     * @param \Application\Entity\Estados $estado
     * @return DesembolsosH
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
     * Set pista
     *
     * @param \Application\Entity\PistasAuditoria $pista
     * @return DesembolsosH
     */
    public function setPista(\Application\Entity\PistasAuditoria $pista = null)
    {
        $this->pista = $pista;
    
        return $this;
    }

    /**
     * Get pista
     *
     * @return \Application\Entity\PistasAuditoria 
     */
    public function getPista()
    {
        return $this->pista;
    }
}