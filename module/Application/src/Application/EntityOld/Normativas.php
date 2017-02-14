<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Normativas
 *
 * @ORM\Table(name="normativas")
 * @ORM\Entity
 */
class Normativas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="normativa_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="normativas_normativa_id_seq", allocationSize=1, initialValue=1)
     */
    private $normativaId;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var \Application\Entity\Entidades
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Entidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entidad_id", referencedColumnName="entidad_id")
     * })
     */
    private $entidad;

    /**
     * @var \Application\Entity\TiposBonos
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\TiposBonos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_id", referencedColumnName="tipo_id")
     * })
     */
    private $tipo;



    /**
     * Get normativaId
     *
     * @return integer 
     */
    public function getNormativaId()
    {
        return $this->normativaId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Normativas
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set entidad
     *
     * @param \Application\Entity\Entidades $entidad
     * @return Normativas
     */
    public function setEntidad(\Application\Entity\Entidades $entidad = null)
    {
        $this->entidad = $entidad;
    
        return $this;
    }

    /**
     * Get entidad
     *
     * @return \Application\Entity\Entidades 
     */
    public function getEntidad()
    {
        return $this->entidad;
    }

    /**
     * Set tipo
     *
     * @param \Application\Entity\TiposBonos $tipo
     * @return Normativas
     */
    public function setTipo(\Application\Entity\TiposBonos $tipo = null)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return \Application\Entity\TiposBonos 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}