<?php

namespace App\Repository;

use App\Entity\Menuitem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Menuitem|null find($id, $lockMode = null, $lockVersion = null)
 * @method Menuitem|null findOneBy(array $criteria, array $orderBy = null)
 * @method Menuitem[]    findAll()
 * @method Menuitem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuitemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menuitem::class);
    }
    
    public function traerMenu(int $MENU_ID, int $ROLE_ID): array
    {
        $em = $this->getEntityManager();
        
        $query = $em->createQuery(
                "SELECT m FROM App\Entity\Menuitem m LEFT JOIN m.rolemenu r ON m.id=r.menu_id AND r.role_id=?1 ".
                 "WHERE ((type_id='1') or (type_id='2')) AND m.availablesel='1' and m.systemop='0' AND menu_id=?2 "
                );
        $query->setParameter(1, $ROLE_ID);
        $query->setParameter(2, $MENU_ID);
        
        return $query->getResult();
    }
    
    public function findAllByMenuYRole(int $menuId, int $roleID): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql="SELECT * FROM rolemenu r LEFT JOIN menuitem m ON m.id=r.menu_id AND r.role_id={$roleID}
                  WHERE m.type_id IN ('1','2') AND m.availablesel=1 and m.menu_id={$menuId} ORDER BY orderlist";

        $stmt = $conn->executeQuery($sql);

        // returna un array asociativo con arrays
        return $stmt->fetchAllAssociative();
    }

    public function itemsMenu(int $menuId): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql="SELECT * FROM menuitem m WHERE m.availablesel=1 and m.menu_id={$menuId} ORDER BY orderlist";

        $stmt = $conn->executeQuery($sql);

        // returna un array asociativo con arrays
        return $stmt->fetchAllAssociative();
    }
    
    // /**
    //  * @return Menuitem[] Returns an array of Menuitem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Menuitem
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
