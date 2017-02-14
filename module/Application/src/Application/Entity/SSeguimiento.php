<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SSeguimiento
 *
 * @ORM\Table(name="s_seguimiento")
 * @ORM\Entity
 */
class SSeguimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_seguimiento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="s_seguimiento_id_seguimiento_seq", allocationSize=1, initialValue=1)
     */
    private $idSeguimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="nro_seguimiento", type="integer", nullable=true)
     */
    private $nroSeguimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="operacion", type="string", length=500, nullable=true)
     */
    private $operacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="resultado_cantidad", type="integer", nullable=true)
     */
    private $resultadoCantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_oportunidad", type="string", length=225, nullable=true)
     */
    private $resultadoOportunidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="resultado_indicador", type="integer", nullable=true)
     */
    private $resultadoIndicador;

    /**
     * @var string
     *
     * @ORM\Column(name="medio_verificacion", type="string", length=225, nullable=true)
     */
    private $medioVerificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="acciones", type="string", length=500, nullable=true)
     */
    private $acciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

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
     * @var \Application\Entity\SReunionSeguimiento
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\SReunionSeguimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_reunion", referencedColumnName="id_reunion")
     * })
     */
    private $idReunion;



    /**
     * Get idSeguimiento
     *
     * @return integer 
     */
    public function getIdSeguimiento()
    {
        return $this->idSeguimiento;
    }

    /**
     * Set nroSeguimiento
     *
     * @param integer $nroSeguimiento
     * @return SSeguimiento
     */
    public function setNroSeguimiento($nroSeguimiento)
    {
        $this->nroSeguimiento = $nroSeguimiento;
    
        return $this;
    }

    /**
     * Get nroSeguimiento
     *
     * @return integer 
     */
    public function getNroSeguimiento()
    {
        return $this->nroSeguimiento;
    }

    /**
     * Set operacion
     *
     * @param string $operacion
     * @return SSeguimiento
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
     * Set resultadoCantidad
     *
     * @param integer $resultadoCantidad
     * @return SSeguimiento
     */
    public function setResultadoCantidad($resultadoCantidad)
    {
        $this->resultadoCantidad = $resultadoCantidad;
    
        return $this;
    }

    /**
     * Get resultadoCantidad
     *
     * @return integer 
     */
    public function getResultadoCantidad()
    {
        return $this->resultadoCantidad;
    }

    /**
     * Set resultadoOportunidad
     *
     * @param string $resultadoOportunidad
     * @return SSeguimiento
     */
    public function setResultadoOportunidad($resultadoOportunidad)
    {
        $this->resultadoOportunidad = $resultadoOportunidad;
    
        return $this;
    }

    /**
     * Get resultadoOportunidad
     *
     * @return string 
     */
    public function getResultadoOportunidad()
    {
        return $this->resultadoOportunidad;
    }

    /**
     * Set resultadoIndicador
     *
     * @param integer $resultadoIndicador
     * @return SSeguimiento
     */
    public function setResultadoIndicador($resultadoIndicador)
    {
        $this->resultadoIndicador = $resultadoIndicador;
    
        return $this;
    }

    /**
     * Get resultadoIndicador
     *
     * @return integer 
     */
    public function getResultadoIndicador()
    {
        return $this->resultadoIndicador;
    }

    /**
     * Set medioVerificacion
     *
     * @param string $medioVerificacion
     * @return SSeguimiento
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
     * Set acciones
     *
     * @param string $acciones
     * @return SSeguimiento
     */
    public function setAcciones($acciones)
    {
        $this->acciones = $acciones;
    
        return $this;
    }

    /**
     * Get acciones
     *
     * @return string 
     */
    public function getAcciones()
    {
        return $this->acciones;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return SSeguimiento
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
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return SSeguimiento
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
     * @return SSeguimiento
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
     * @return SSeguimiento
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
     * @return SSeguimiento
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
     * Set idReunion
     *
     * @param \Application\Entity\SReunionSeguimiento $idReunion
     * @return SSeguimiento
     */
    public function setIdReunion(\Application\Entity\SReunionSeguimiento $idReunion = null)
    {
        $this->idReunion = $idReunion;
    
        return $this;
    }

    /**
     * Get idReunion
     *
     * @return \Application\Entity\SReunionSeguimiento 
     */
    public function getIdReunion()
    {
        return $this->idReunion;
    }
}