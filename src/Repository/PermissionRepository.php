<?php

namespace App\Repository;

use App\Entity\Permission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PermissionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Permission::class);
    }


    public function findByName($value)
    {
        return $this->createQueryBuilder('p')
            ->where('p.name = :value')->setParameter('value', $value)
            ->getQuery()
            ->getResult()
        ;
    }

}
