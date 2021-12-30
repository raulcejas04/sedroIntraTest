<?php

namespace App\Repository;

use App\Entity\IssueReport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IssueReport|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssueReport|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssueReport[]    findAll()
 * @method IssueReport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IssueReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IssueReport::class);
    }

    // /**
    //  * @return IssueReport[] Returns an array of IssueReport objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IssueReport
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
