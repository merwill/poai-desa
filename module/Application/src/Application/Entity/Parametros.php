<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parametros
 *
 * @ORM\Table(name="parametros")
 * @ORM\Entity
 */
class Parametros
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_parametro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="parametros_id_parametro_seq", allocationSize=1, initialValue=1)
     */
    private $idParametro;

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
     * @ORM\Column(name="ruta_adjunto", type="string", length=200, nullable=true)
     */
    private $rutaAdjunto;

    /**
     * @var \Application\Entity\Parametros
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Parametros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_padre_parametro", referencedColumnName="id_parametro")
     * })
     */
    private $idPadreParametro;



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
     * Set sigla
     *
     * @param string $sigla
     * @return Parametros
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
     * @return Parametros
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
     * @return Parametros
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
     * @return Parametros
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
     * @return Parametros
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
     * @return Parametros
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
     * @return Parametros
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
     * @return Parametros
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
     * Set rutaAdjunto
     *
     * @param string $rutaAdjunto
     * @return Parametros
     */
    public function setRutaAdjunto($rutaAdjunto)
    {
        $this->rutaAdjunto = $rutaAdjunto;
    
        return $this;
    }

    /**
     * Get rutaAdjunto
     *
     * @return string 
     */
    public function getRutaAdjunto()
    {
        return $this->rutaAdjunto;
    }

    /**
     * Set idPadreParametro
     *
     * @param \Application\Entity\Parametros $idPadreParametro
     * @return Parametros
     */
    public function setIdPadreParametro(\Application\Entity\Parametros $idPadreParametro = null)
    {
        $this->idPadreParametro = $idPadreParametro;
    
        return $this;
    }

    /**
     * Get idPadreParametro
     *
     * @return \Application\Entity\Parametros 
     */
    public function getIdPadreParametro()
    {
        return $this->idPadreParametro;
    }
}