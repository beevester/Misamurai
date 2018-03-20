<?php

namespace App\Repository;

use App\Entity\Nomination;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class NominationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Nomination::class);
    }

    public function findByNominee($username)
    {
        return $this->createQueryBuilder('n')
            ->innerJoin('n.nominee', 'c')
            ->addSelect('c')
            ->andWhere('c.username LIKE :value')
            ->setParameter('value', '%'.$username.'%')
            ->getQuery()
            ->getResult()
        ;
    }

}
