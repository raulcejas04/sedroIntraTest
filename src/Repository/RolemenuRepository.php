<?php

namespace App\Repository;

use App\Entity\Rolemenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rolemenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rolemenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rolemenu[]    findAll()
 * @method Rolemenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RolemenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rolemenu::class);
    }

    // /**
    //  * @return Rolemenu[] Returns an array of Rolemenu objects
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
    public function findOneBySomeField($value): ?Rolemenu
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
