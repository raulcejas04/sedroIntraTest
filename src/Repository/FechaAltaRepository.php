<?php

namespace App\Repository;

use App\Entity\FechaAlta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FechaAlta|null find($id, $lockMode = null, $lockVersion = null)
 * @method FechaAlta|null findOneBy(array $criteria, array $orderBy = null)
 * @method FechaAlta[]    findAll()
 * @method FechaAlta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FechaAltaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FechaAlta::class);
    }

    // /**
    //  * @return FechaAlta[] Returns an array of FechaAlta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FechaAlta
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
