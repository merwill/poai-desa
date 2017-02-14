<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CreditosNormativas
 *
 * @ORM\Table(name="creditos_normativas")
 * @ORM\Entity
 */
class CreditosNormativas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_credito_normativa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="creditos_normativas_id_credito_normativa_seq", allocationSize=1, initialValue=1)
     */
    private $idCreditoNormativa;

    /**
     * @var \Application\Entity\Creditos
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Creditos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="credito_id", referencedColumnName="credito_id")
     * })
     */
    private $credito;

    /**
     * @var \Application\Entity\Normativas
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Normativas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="normativa_id", referencedColumnName="normativa_id")
     * })
     */
    private $normativa;



    /**
     * Get idCreditoNormativa
     *
     * @return integer 
     */
    public function getIdCreditoNormativa()
    {
        return $this->idCreditoNormativa;
    }

    /**
     * Set credito
     *
     * @param \Application\Entity\Creditos $credito
     * @return CreditosNormativas
     */
    public function setCredito(\Application\Entity\Creditos $credito = null)
    {
        $this->credito = $credito;
    
        return $this;
    }

    /**
     * Get credito
     *
     * @return \Application\Entity\Creditos 
     */
    public function getCredito()
    {
        return $this->credito;
    }

    /**
     * Set normativa
     *
     * @param \Application\Entity\Normativas $normativa
     * @return CreditosNormativas
     */
    public function setNormativa(\Application\Entity\Normativas $normativa = null)
    {
        $this->normativa = $normativa;
    
        return $this;
    }

    /**
     * Get normativa
     *
     * @return \Application\Entity\Normativas 
     */
    public function getNormativa()
    {
        return $this->normativa;
    }
}