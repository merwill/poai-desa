<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametrosH
 *
 * @ORM\Table(name="parametros_h")
 * @ORM\Entity
 */
class ParametrosH
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_parametro_h", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="parametros_h_id_parametro_h_seq", allocationSize=1, initialValue=1)
     */
    private $idParametroH;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_parametro", type="integer", nullable=false)
     */
    private $idParametro;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_padre_parametro", type="integer", nullable=false)
     */
    private $idPadreParametro;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=10, nullable=false)
     */
    private $sigla;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=false)
     */
    private $descripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_usuario", type="string", length=100, nullable=true)
     */
    private $codUsuario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=true)
     */
    private $fechaHora;

    /**
     * @var string
     *
     * @ORM\Column(name="estacion", type="string", length=100, nullable=true)
     */
    private $estacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel", type="integer", nullable=true)
     */
    private $nivel;

    /**
     * @var string
     *
     * @ORM\Column(name="accion", type="string", length=15, nullable=true)
     */
    private $accion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora_accion", type="datetime", nullable=true)
     */
    private $fechaHoraAccion;



    /**
     * Get idParametroH
     *
     * @return integer 
     */
    public function getIdParametroH()
    {
        return $this->idParametroH;
    }

    /**
     * Set idParametro
     *
     * @param integer $idParametro
     * @return ParametrosH
     */
    public function setIdParametro($idParametro)
    {
        $this->idParametro = $idParametro;
    
        return $this;
    }

    /**
     * Get idParametro
     *
     * @return integer 
     */
    public function getIdParametro()
    {
        return $this->idParametro;
    }

    /**
     * Set idPadreParametro
     *
     * @param integer $idPadreParametro
     * @return ParametrosH
     */
    public function setIdPadreParametro($idPadreParametro)
    {
        $this->idPadreParametro = $idPadreParametro;
    
        return $this;
    }

    /**
     * Get idPadreParametro
     *
     * @return integer 
     */
    public function getIdPadreParametro()
    {
        return $this->idPadreParametro;
    }

    /**
     * Set sigla
     *
     * @param string $sigla
     * @return ParametrosH
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    
        return $this;
    }

    /**
     * Get sigla
     *
     * @return string 
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ParametrosH
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return ParametrosH
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
     * Set orden
     *
     * @param integer $orden
     * @return ParametrosH
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    
        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set codUsuario
     *
     * @param string $codUsuario
     * @return ParametrosH
     */
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;
    
        return $this;
    }

    /**
     * Get codUsuario
     *
     * @return string 
     */
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    /**
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     * @return ParametrosH
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
     * Set estacion
     *
     * @param string $estacion
     * @return ParametrosH
     */
    public function setEstacion($estacion)
    {
        $this->estacion = $estacion;
    
        return $this;
    }

    /**
     * Get estacion
     *
     * @return string 
     */
    public function getEstacion()
    {
        return $this->estacion;
    }

    /**
     * Set nivel
     *
     * @param integer $nivel
     * @return ParametrosH
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    
        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer 
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set accion
     *
     * @param string $accion
     * @return ParametrosH
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
     * Set fechaHoraAccion
     *
     * @param \DateTime $fechaHoraAccion
     * @return ParametrosH
     */
    public function setFechaHoraAccion($fechaHoraAccion)
    {
        $this->fechaHoraAccion = $fechaHoraAccion;
    
        return $this;
    }

    /**
     * Get fechaHoraAccion
     *
     * @return \DateTime 
     */
    public function getFechaHoraAccion()
    {
        return $this->fechaHoraAccion;
    }
}