<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acciones
 *
 * @ORM\Table(name="acciones")
 * @ORM\Entity
 */
class Acciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="accion_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="acciones_accion_id_seq", allocationSize=1, initialValue=1)
     */
    private $accionId;

    /**
     * @var string
     *
     * @ORM\Column(name="accion", type="string", length=20, nullable=true)
     */
    private $accion;



    /**
     * Get accionId
     *
     * @return integer 
     */
    public function getAccionId()
    {
        return $this->accionId;
    }

    /**
     * Set accion
     *
     * @param string $accion
     * @return Acciones
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
}