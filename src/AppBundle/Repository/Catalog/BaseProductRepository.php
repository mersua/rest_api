<?php

namespace AppBundle\Repository\Catalog;

use AppBundle\Entity\Catalog\BaseProduct;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class BaseProductRepository
{
    private $entityRepository;
    private $entityManager;
    public function __construct(EntityRepository $entityRepository, EntityManagerInterface $entityManager) {
        $this->entityRepository = $entityRepository;
        $this->entityManager = $entityManager;
    }
}