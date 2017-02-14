<?php

namespace Application\Entity\Repositories;

use Doctrine\ORM\EntityRepository;

class BaseEntityRepository extends EntityRepository
{
    protected $em = null;

    function __construct($em)
    {
        $this->em = $em;
    }

}
