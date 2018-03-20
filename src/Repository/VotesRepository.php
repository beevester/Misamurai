<?php

namespace App\Repository;

use App\Entity\Votes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class VotesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Votes::class);
    }

    public function findByNomination($value)
    {
      return $this->createQueryBuilder('n')
          ->innerJoin('n.nomination', 'c')
          ->addSelect('c')
          ->andWhere('c.id = :value')
          ->setParameter('value', $value)
          ->getQuery()
          ->getOneOrNullResult();
    }

}
