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
     * @ORM\Column(name="tabla", type="string", length=30, nullable=true)
     */
    private $tabla;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=30, nullable=true)
     */
    private $usuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return PistasAuditoria
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
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
     * @param \Application\Entity\Acciones $accion
     * @return PistasAuditoria
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
}