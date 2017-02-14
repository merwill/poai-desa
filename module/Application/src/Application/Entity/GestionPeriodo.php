<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GestionPeriodo
 *
 * @ORM\Table(name="gestion_periodo")
 * @ORM\Entity
 */
class GestionPeriodo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_gp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="gestion_periodo_id_gp_seq", allocationSize=1, initialValue=1)
     */
    private $idGp;

    /**
     * @var integer
     *
     * @ORM\Column(name="gestion", type="integer", nullable=true)
     */
    private $gestion;

    /**
     * @var integer
     *
     * @ORM\Column(name="periodo", type="integer", nullable=true)
     */
    private $periodo;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="vigencia", type="string", nullable=true)
     */
    private $vigencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ini", type="date", nullable=true)
     */
    private $fechaIni;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="pa_usuario", type="string", length=50, nullable=true)
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
     * @ORM\Column(name="pa_estacion", type="string", length=50, nullable=true)
     */
    private $paEstacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=true)
     */
    private $descripcion;



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
     * Set gestion
     *
     * @param integer $gestion
     * @return GestionPeriodo
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
     * Set periodo
     *
     * @param integer $periodo
     * @return GestionPeriodo
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    
        return $this;
    }

    /**
     * Get periodo
     *
     * @return integer 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return GestionPeriodo
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set vigencia
     *
     * @param string $vigencia
     * @return GestionPeriodo
     */
    public function setVigencia($vigencia)
    {
        $this->vigencia = $vigencia;
    
        return $this;
    }

    /**
     * Get vigencia
     *
     * @return string 
     */
    public function getVigencia()
    {
        return $this->vigencia;
    }

    /**
     * Set fechaIni
     *
     * @param \DateTime $fechaIni
     * @return GestionPeriodo
     */
    public function setFechaIni($fechaIni)
    {
        $this->fechaIni = $fechaIni;
    
        return $this;
    }

    /**
     * Get fechaIni
     *
     * @return \DateTime 
     */
    public function getFechaIni()
    {
        return $this->fechaIni;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return GestionPeriodo
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set paUsuario
     *
     * @param string $paUsuario
     * @return GestionPeriodo
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
     * @return GestionPeriodo
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
     * @return GestionPeriodo
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return GestionPeriodo
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
}