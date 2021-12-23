<?php

namespace App\Repository;

use App\Entity\Solicitud;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Solicitud|null find($id, $lockMode = null, $lockVersion = null)
 * @method Solicitud|null findOneBy(array $criteria, array $orderBy = null)
 * @method Solicitud[]    findAll()
 * @method Solicitud[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolicitudRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Solicitud::class);
    }

    // /**
    //  * @return Solicitud[] Returns an array of Solicitud objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    public function findSolicitudActiva($mail, $nicname, $cuit, $cuil)
    {
        return $this->createQueryBuilder('s')
        ->andWhere('s.mail = :mail')
        ->andWhere('s.nicname = :nicname')
        ->andWhere('s.cuit = :cuit')
        ->andWhere('s.cuil = :cuil')
        ->andWhere('s.fechaExpiracion IS NULL')
        ->andWhere('s.fechaAlta IS NULL')
        ->andWhere('s.correccion IS NULL')
        ->andWhere('s.usada IS NULL')
        ->setParameter('mail', $mail)
        ->setParameter('nicname', $nicname)
        ->setParameter('cuit', $cuit)
        ->setParameter('cuil', $cuil)
        ->getQuery()
        ->getOneOrNullResult()    
        ;

        return $this->createQueryBuilder('pf')            
            ->leftJoin('pf.representaciones', 'r')
            ->leftJoin('r.personaJuridica', 'pj')
            ->leftJoin('pj.dispositivos', 'd')
            ->leftJoin('pj.solicitudes', 's')
            ->getQuery()
            ->getResult();
    }
    
}
