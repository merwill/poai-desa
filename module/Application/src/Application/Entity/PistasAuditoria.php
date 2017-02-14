<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PistasAuditoria
 *
 * @ORM\Table(name="pistas_auditoria")
 * @ORM\Entity
 */
class PistasAuditoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pista_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="pistas_auditoria_pista_id_seq", allocationSize=1, initialValue=1)
     */
    private $pistaId;

    /**
     * @var string
     *
     * @ORM\Column(name="tabla", type="string", length=50, nullable=true)
     */
    private $tabla;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=50, nullable=true)
     */
    private $usuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=true)
     */
    private $fechaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=20, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="accion", type="string", length=10, nullable=true)
     */
    private $accion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_registro", type="integer", nullable=true)
     */
    private $idRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="datos_2", type="string", nullable=true)
     */
    private $datos2;

    /**
     * @var string
     *
     * @ORM\Column(name="datos_3", type="string", nullable=true)
     */
    private $datos3;



    /**
     * Get pistaId
     *
     * @return integer 
     */
    public function getPistaId()
    {
        return $this->pistaId;
    }

    /**
     * Set tabla
     *
     * @param string $tabla
     * @return PistasAuditoria
     */
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;
    
        return $this;
    }

    /**
     * Get tabla
     *
     * @return string 
     */
    public function getTabla()
    {
        return $this->tabla;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return PistasAuditoria
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
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return PistasAuditoria
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;
    
        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return \DateTime 
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return PistasAuditoria
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
     * @param string $accion
     * @return PistasAuditoria
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;
    
        return $this;
    }

    /**
     * Get accion
     *
     * @return string 
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * Set idRegistro
     *
     * @param integer $idRegistro
     * @return PistasAuditoria
     */
    public function setIdRegistro($idRegistro)
    {
        $this->idRegistro = $idRegistro;
    
        return $this;
    }

    /**
     * Get idRegistro
     *
     * @return integer 
     */
    public function getIdRegistro()
    {
        return $this->idRegistro;
    }

    /**
     * Set datos2
     *
     * @param string $datos2
     * @return PistasAuditoria
     */
    public function setDatos2($datos2)
    {
        $this->datos2 = $datos2;
    
        return $this;
    }

    /**
     * Get datos2
     *
     * @return string 
     */
    public function getDatos2()
    {
        return $this->datos2;
    }

    /**
     * Set datos3
     *
     * @param string $datos3
     * @return PistasAuditoria
     */
    public function setDatos3($datos3)
    {
        $this->datos3 = $datos3;
    
        return $this;
    }

    /**
     * Get datos3
     *
     * @return string 
     */
    public function getDatos3()
    {
        return $this->datos3;
    }
}