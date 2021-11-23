<?php

namespace App\Repository;

use App\Entity\RolKeycloak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RolKeycloak|null find($id, $lockMode = null, $lockVersion = null)
 * @method RolKeycloak|null findOneBy(array $criteria, array $orderBy = null)
 * @method RolKeycloak[]    findAll()
 * @method RolKeycloak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RolKeycloakRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RolKeycloak::class);
    }

    // /**
    //  * @return RolKeycloak[] Returns an array of RolKeycloak objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RolKeycloak
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
