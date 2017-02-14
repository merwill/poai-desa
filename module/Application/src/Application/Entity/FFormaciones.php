<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FFormaciones
 *
 * @ORM\Table(name="f_formaciones")
 * @ORM\Entity
 */
class FFormaciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_formacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="f_formaciones_id_formacion_seq", allocationSize=1, initialValue=1)
     */
    private $idFormacion;

    /**
     * @var string
     *
     * @ORM\Column(name="area_formacion", type="string", length=225, nullable=true)
     */
    private $areaFormacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

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
     * @var integer
     *
     * @ORM\Column(name="id_grados_formaciones_p", type="integer", nullable=true)
     */
    private $idGradosFormacionesP;

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
     * Get idFormacion
     *
     * @return integer 
     */
    public function getIdFormacion()
    {
        return $this->idFormacion;
    }

    /**
     * Set areaFormacion
     *
     * @param string $areaFormacion
     * @return FFormaciones
     */
    public function setAreaFormacion($areaFormacion)
    {
        $this->areaFormacion = $areaFormacion;
    
        return $this;
    }

    /**
     * Get areaFormacion
     *
     * @return string 
     */
    public function getAreaFormacion()
    {
        return $this->areaFormacion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return FFormaciones
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
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return FFormaciones
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
     * @return FFormaciones
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
     * @return FFormaciones
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
     * @return FFormaciones
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
     * Set idGradosFormacionesP
     *
     * @param integer $idGradosFormacionesP
     * @return FFormaciones
     */
    public function setIdGradosFormacionesP($idGradosFormacionesP)
    {
        $this->idGradosFormacionesP = $idGradosFormacionesP;
    
        return $this;
    }

    /**
     * Get idGradosFormacionesP
     *
     * @return integer 
     */
    public function getIdGradosFormacionesP()
    {
        return $this->idGradosFormacionesP;
    }

    /**
     * Set idPoai
     *
     * @param \Application\Entity\FPoai $idPoai
     * @return FFormaciones
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