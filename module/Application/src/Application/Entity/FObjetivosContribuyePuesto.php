<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FObjetivosContribuyePuesto
 *
 * @ORM\Table(name="f_objetivos_contribuye_puesto")
 * @ORM\Entity
 */
class FObjetivosContribuyePuesto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_objetivo_contribuye", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_objetivos_contribuye_puesto_id_objetivo_contribuye_seq", allocationSize=1, initialValue=1)
     */
    private $idObjetivoContribuye;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_objetivo", type="string", length=30, nullable=true)
     */
    private $codigoObjetivo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_objetivo", type="string", length=225, nullable=true)
     */
    private $descripcionObjetivo;

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
     * @var \Application\Entity\FPoai
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\FPoai")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_poai", referencedColumnName="id_poai")
     * })
     */
    private $idPoai;



    /**
     * Get idObjetivoContribuye
     *
     * @return integer 
     */
    public function getIdObjetivoContribuye()
    {
        return $this->idObjetivoContribuye;
    }

    /**
     * Set codigoObjetivo
     *
     * @param string $codigoObjetivo
     * @return FObjetivosContribuyePuesto
     */
    public function setCodigoObjetivo($codigoObjetivo)
    {
        $this->codigoObjetivo = $codigoObjetivo;
    
        return $this;
    }

    /**
     * Get codigoObjetivo
     *
     * @return string 
     */
    public function getCodigoObjetivo()
    {
        return $this->codigoObjetivo;
    }

    /**
     * Set descripcionObjetivo
     *
     * @param string $descripcionObjetivo
     * @return FObjetivosContribuyePuesto
     */
    public function setDescripcionObjetivo($descripcionObjetivo)
    {
        $this->descripcionObjetivo = $descripcionObjetivo;
    
        return $this;
    }

    /**
     * Get descripcionObjetivo
     *
     * @return string 
     */
    public function getDescripcionObjetivo()
    {
        return $this->descripcionObjetivo;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return FObjetivosContribuyePuesto
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
     * @return FObjetivosContribuyePuesto
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
     * @return FObjetivosContribuyePuesto
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
     * @return FObjetivosContribuyePuesto
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
     * Set idPoai
     *
     * @param \Application\Entity\FPoai $idPoai
     * @return FObjetivosContribuyePuesto
     */
    public function setIdPoai(\Application\Entity\FPoai $idPoai = null)
    {
        $this->idPoai = $idPoai;
    
        return $this;
    }

    /**
     * Get idPoai
     *
     * @return \Application\Entity\FPoai 
     */
    public function getIdPoai()
    {
        return $this->idPoai;
    }
}