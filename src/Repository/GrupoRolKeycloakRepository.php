<?php

namespace App\Repository;

use App\Entity\GrupoRolKeycloak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GrupoRolKeycloak|null find($id, $lockMode = null, $lockVersion = null)
 * @method GrupoRolKeycloak|null findOneBy(array $criteria, array $orderBy = null)
 * @method GrupoRolKeycloak[]    findAll()
 * @method GrupoRolKeycloak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrupoRolKeycloakRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GrupoRolKeycloak::class);
    }

    // /**
    //  * @return GrupoRolKeycloak[] Returns an array of GrupoRolKeycloak objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GrupoRolKeycloak
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
