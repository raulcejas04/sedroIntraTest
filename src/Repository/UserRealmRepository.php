<?php

namespace App\Repository;

use App\Entity\UserRealm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserRealm|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserRealm|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserRealm[]    findAll()
 * @method UserRealm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRealmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserRealm::class);
    }

    // /**
    //  * @return UserRealm[] Returns an array of UserRealm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserRealm
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
