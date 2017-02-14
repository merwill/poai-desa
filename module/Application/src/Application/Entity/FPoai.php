<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FPoai
 *
 * @ORM\Table(name="f_poai")
 * @ORM\Entity
 */
class FPoai
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_poai", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_poai_id_poai_seq", allocationSize=1, initialValue=1)
     */
    private $idPoai;

    /**
     * @var integer
     *
     * @ORM\Column(name="gestion", type="integer", nullable=true)
     */
    private $gestion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="pa_usuario", type="string", length=100, nullable=true)
     */
    private $paUsuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pa_fecha_hora", type="datetime", nullable=true)
     */
    private $paFechaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="pa_estacion", type="string", length=100, nullable=true)
     */
    private $paEstacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="datetime", nullable=true)
     */
    private $fechaModificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_gp", type="integer", nullable=true)
     */
    private $idGp;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_persona", type="integer", nullable=true)
     */
    private $idPersona;

    /**
     * @var \Application\Entity\Puesto
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Puesto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nro_item", referencedColumnName="nro_item")
     * })
     */
    private $nroItem;



    /**
     * Get idPoai
     *
     * @return integer 
     */
    public function getIdPoai()
    {
        return $this->idPoai;
    }

    /**
     * Set gestion
     *
     * @param integer $gestion
     * @return FPoai
     */
    public function setGestion($gestion)
    {
        $this->gestion = $gestion;
    
        return $this;
    }

    /**
     * Get gestion
     *
     * @return integer 
     */
    public function getGestion()
    {
        return $this->gestion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return FPoai
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set paUsuario
     *
     * @param string $paUsuario
     * @return FPoai
     */
    public function setPaUsuario($paUsuario)
    {
        $this->paUsuario = $paUsuario;
    
        return $this;
    }

    /**
     * Get paUsuario
     *
     * @return string 
     */
    public function getPaUsuario()
    {
        return $this->paUsuario;
    }

    /**
     * Set paFechaHora
     *
     * @param \DateTime $paFechaHora
     * @return FPoai
     */
    public function setPaFechaHora($paFechaHora)
    {
        $this->paFechaHora = $paFechaHora;
    
        return $this;
    }

    /**
     * Get paFechaHora
     *
     * @return \DateTime 
     */
    public function getPaFechaHora()
    {
        return $this->paFechaHora;
    }

    /**
     * Set paEstacion
     *
     * @param string $paEstacion
     * @return FPoai
     */
    public function setPaEstacion($paEstacion)
    {
        $this->paEstacion = $paEstacion;
    
        return $this;
    }

    /**
     * Get paEstacion
     *
     * @return string 
     */
    public function getPaEstacion()
    {
        return $this->paEstacion;
    }

    /**
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     * @return FPoai
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
     * Set idGp
     *
     * @param integer $idGp
     * @return FPoai
     */
    public function setIdGp($idGp)
    {
        $this->idGp = $idGp;
    
        return $this;
    }

    /**
     * Get idGp
     *
     * @return integer 
     */
    public function getIdGp()
    {
        return $this->idGp;
    }

    /**
     * Set idPersona
     *
     * @param integer $idPersona
     * @return FPoai
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    
        return $this;
    }

    /**
     * Get idPersona
     *
     * @return integer 
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set nroItem
     *
     * @param \Application\Entity\Puesto $nroItem
     * @return FPoai
     */
    public function setNroItem(\Application\Entity\Puesto $nroItem = null)
    {
        $this->nroItem = $nroItem;
    
        return $this;
    }

    /**
     * Get nroItem
     *
     * @return \Application\Entity\Puesto 
     */
    public function getNroItem()
    {
        return $this->nroItem;
    }
}