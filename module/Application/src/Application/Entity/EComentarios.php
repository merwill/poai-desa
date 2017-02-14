<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EComentarios
 *
 * @ORM\Table(name="e_comentarios")
 * @ORM\Entity
 */
class EComentarios
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_comentario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="e_comentarios_id_comentario_seq", allocationSize=1, initialValue=1)
     */
    private $idComentario;

    /**
     * @var string
     *
     * @ORM\Column(name="evaluadores", type="string", length=2000, nullable=true)
     */
    private $evaluadores;

    /**
     * @var string
     *
     * @ORM\Column(name="evaluado", type="string", length=2000, nullable=true)
     */
    private $evaluado;

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
     * @ORM\Column(name="modificacdor", type="string", length=100, nullable=true)
     */
    private $modificacdor;

    /**
     * @var \Application\Entity\EEvaluacion
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EEvaluacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evaluacion", referencedColumnName="id_evaluacion")
     * })
     */
    private $idEvaluacion;



    /**
     * Get idComentario
     *
     * @return integer 
     */
    public function getIdComentario()
    {
        return $this->idComentario;
    }

    /**
     * Set evaluadores
     *
     * @param string $evaluadores
     * @return EComentarios
     */
    public function setEvaluadores($evaluadores)
    {
        $this->evaluadores = $evaluadores;
    
        return $this;
    }

    /**
     * Get evaluadores
     *
     * @return string 
     */
    public function getEvaluadores()
    {
        return $this->evaluadores;
    }

    /**
     * Set evaluado
     *
     * @param string $evaluado
     * @return EComentarios
     */
    public function setEvaluado($evaluado)
    {
        $this->evaluado = $evaluado;
    
        return $this;
    }

    /**
     * Get evaluado
     *
     * @return string 
     */
    public function getEvaluado()
    {
        return $this->evaluado;
    }

    /**
     * Set fechaElaboracion
     *
     * @param \DateTime $fechaElaboracion
     * @return EComentarios
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
     * @return EComentarios
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
     * @return EComentarios
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
     * Set modificacdor
     *
     * @param string $modificacdor
     * @return EComentarios
     */
    public function setModificacdor($modificacdor)
    {
        $this->modificacdor = $modificacdor;
    
        return $this;
    }

    /**
     * Get modificacdor
     *
     * @return string 
     */
    public function getModificacdor()
    {
        return $this->modificacdor;
    }

    /**
     * Set idEvaluacion
     *
     * @param \Application\Entity\EEvaluacion $idEvaluacion
     * @return EComentarios
     */
    public function setIdEvaluacion(\Application\Entity\EEvaluacion $idEvaluacion = null)
    {
        $this->idEvaluacion = $idEvaluacion;
    
        return $this;
    }

    /**
     * Get idEvaluacion
     *
     * @return \Application\Entity\EEvaluacion 
     */
    public function getIdEvaluacion()
    {
        return $this->idEvaluacion;
    }
}