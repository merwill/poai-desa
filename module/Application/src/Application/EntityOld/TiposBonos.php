<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TiposBonos
 *
 * @ORM\Table(name="tipos_bonos")
 * @ORM\Entity
 */
class TiposBonos
{
    /**
     * @var string
     *
     * @ORM\Column(name="tipo_id", type="string", length=5, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipos_bonos_tipo_id_seq", allocationSize=1, initialValue=1)
     */
    private $tipoId;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=20, nullable=true)
     */
    private $tipo;



    /**
     * Get tipoId
     *
     * @return string 
     */
    public function getTipoId()
    {
        return $this->tipoId;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return TiposBonos
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}