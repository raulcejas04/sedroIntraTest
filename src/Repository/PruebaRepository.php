<?php

namespace App\Repository;

use App\Entity\Prueba;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prueba|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prueba|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prueba[]    findAll()
 * @method Prueba[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PruebaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prueba::class);
    }
    
    public function getDataForm(string $formname): array
    {
        $retorno = array();
        $conn = $this->getEntityManager()->getConnection();
        $sql="SELECT id FROM xcnf_form f WHERE f.form_name='{$formname}'";
        $stmt = $conn->executeQuery($sql);
        $dataid =  $stmt->fetchAllAssociative();
        $id = (isset($dataid[0]['id']))?$dataid[0]['id']:0;
        if($id>0){
           $sql="SELECT * FROM xcnf_formfield f WHERE f.form_id={$id}";
           $stmt = $conn->executeQuery($sql);
           $data =  $stmt->fetchAllAssociative();
           
           $retorno = $this->formatoCampoForm($formname,$data);
           
        }
        //echo count($retorno); die();
        //echo "<pre>";print_r($data); echo "</pre>";die();
        return $retorno;
    }

    public function formatoCampoForm($formname,$data): array
    {
        
        $ret = array();
        foreach ($data as $ka=>$arr)
        {
            $aux = array();
            //echo "<pre>";print_r($arr); echo "</pre>";die();
            foreach($arr as $k=>$v)
            {
                if($k=='fieldname'){
                    $fieldname=$formname."_".$v;
                    
                }else{
                    if ( !(($k=='id') || ($k=='form_id')))
                    {
                        if ($v!=null){
                            $aux[$k] = $v;
                        }
                    }                    
                }
            }
            $aux['fieldname'] = $fieldname;
            $aux['fieldname_err'] = "err_".$fieldname;
            $ret[] = $aux;        
        }

        return $ret;
    }


    // /**
    //  * @return Prueba[] Returns an array of Prueba objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Prueba
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
