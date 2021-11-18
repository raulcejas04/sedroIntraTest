<?php

namespace App\Repository;

use App\Entity\GrupoKeycloak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GrupoKeycloak|null find($id, $lockMode = null, $lockVersion = null)
 * @method GrupoKeycloak|null findOneBy(array $criteria, array $orderBy = null)
 * @method GrupoKeycloak[]    findAll()
 * @method GrupoKeycloak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrupoKeycloakRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GrupoKeycloak::class);
    }

    // /**
    //  * @return GrupoKeycloak[] Returns an array of GrupoKeycloak objects
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
    public function findOneBySomeField($value): ?GrupoKeycloak
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
