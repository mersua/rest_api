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

    public function findOneProductById($id)
    {
        return $this->entityRepository->createQueryBuilder('b_p')
            ->where('b_p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function addProduct($product)
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

    public function findProductsAll()
    {
        return $this->entityRepository->findAll();
    }

    public function removeProduct($product)
    {
        $this->entityManager->remove($product);
        $this->entityManager->flush();
    }
}
