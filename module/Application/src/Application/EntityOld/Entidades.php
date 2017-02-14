<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entidades
 *
 * @ORM\Table(name="entidades")
 * @ORM\Entity
 */
class Entidades 
{
    /**
     * @var string
     *
     * @ORM\Column(name="entidad_id", type="string", length=5, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="entidades_entidad_id_seq", allocationSize=1, initialValue=1)
     */
    private $entidadId;

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
     *   @ORM\JoinColumn(name="dependencia_id", referencedColumnName="entidad_id")
     * })
     */
    private $dependencia;



    /**
     * Get entidadId
     *
     * @return string 
     */
    public function getEntidadId()
    {
        return $this->entidadId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Entidades
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
     * Set dependencia
     *
     * @param \Application\Entity\Entidades $dependencia
     * @return Entidades
     */
    public function setDependencia(\Application\Entity\Entidades $dependencia = null)
    {
        $this->dependencia = $dependencia;
    
        return $this;
    }

    /**
     * Get dependencia
     *
     * @return \Application\Entity\Entidades 
     */
    public function getDependencia()
    {
        return $this->dependencia;
    }
}