<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ETemasSugeridos
 *
 * @ORM\Table(name="e_temas_sugeridos")
 * @ORM\Entity
 */
class ETemasSugeridos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_temas", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_temas_sugeridos_id_temas_seq", allocationSize=1, initialValue=1)
     */
    private $idTemas;

    /**
     * @var string
     *
     * @ORM\Column(name="denominacion", type="string", length=225, nullable=true)
     */
    private $denominacion;

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
     * @var \Application\Entity\EInformeActividades
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EInformeActividades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_informe_actividades", referencedColumnName="id_informe_actividades")
     * })
     */
    private $idInformeActividades;



    /**
     * Get idTemas
     *
     * @return integer 
     */
    public function getIdTemas()
    {
        return $this->idTemas;
    }

    /**
     * Set denominacion
     *
     * @param string $denominacion
     * @return ETemasSugeridos
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    
        return $this;
    }

    /**
     * Get denominacion
     *
     * @return string 
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return ETemasSugeridos
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
     * @return ETemasSugeridos
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
     * @return ETemasSugeridos
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
     * @return ETemasSugeridos
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
     * Set idInformeActividades
     *
     * @param \Application\Entity\EInformeActividades $idInformeActividades
     * @return ETemasSugeridos
     */
    public function setIdInformeActividades(\Application\Entity\EInformeActividades $idInformeActividades = null)
    {
        $this->idInformeActividades = $idInformeActividades;
    
        return $this;
    }

    /**
     * Get idInformeActividades
     *
     * @return \Application\Entity\EInformeActividades 
     */
    public function getIdInformeActividades()
    {
        return $this->idInformeActividades;
    }
}