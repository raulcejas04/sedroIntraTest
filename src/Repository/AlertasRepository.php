<?php

namespace App\Repository;

use App\Entity\Alertas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Alertas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alertas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alertas[]    findAll()
 * @method Alertas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlertasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alertas::class);
    }
    
    /**
     * Recupera los dispositivos segun la persona fisica
     * @param int $personaFisicaId
     * @return array 
     */
    public function findByNoLeidos(int $personaFisicaId): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql="SELECT * FROM alertas a
              WHERE a.persona_fisica_id>0"; // AND persona_fisica_id={$personaFisicaId}

        $stmt = $conn->executeQuery($sql);
        return $stmt->fetchAllAssociative();
    }


    /**
     * Recupera la cantidad de alertas para una persona
     * @param int $personaFisicaId
     * @return array 
     */
    public function cantidadPorPersona(int $personaFisicaId): int
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql="SELECT count(*) as cantidad FROM alertas a WHERE a.persona_fisica_id={$personaFisicaId}"; // AND persona_fisica_id={$personaFisicaId}
        $stmt = $conn->executeQuery($sql);
        $res = $stmt->fetchAllAssociative();
        
        $cantidad = (isset($res[0]['cantidad'])) ? $res[0]['cantidad']:0;
        return $cantidad;
    }
    
    
    // /**
    //  * @return Alertas[] Returns an array of Alertas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Alertas
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
