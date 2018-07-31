<?php

namespace AppBundle\Repository;
use Doctrine\ORM\Query\Expr\Join;

/**
 * CoProRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CoProRepository extends \Doctrine\ORM\EntityRepository
{
    public function findCoproByAdresse($search, $id){
        $fields = array('c.id','c.name','c.adresse', 'c.codePostal','c.ville');
        return $this->createQueryBuilder('c')
            ->select($fields)
            ->getQuery()
            ->getResult()
            ;
    }
}

//SELECT co_pro.*, user.id
//FROM co_pro
//  INNER JOIN user_co_pro
//    ON co_pro.id = user_co_pro.co_pro_id
//  INNER JOIN user
//    ON user_co_pro.user_id = user.id
//WHERE user_co_pro.user_id = 3
//and co_pro.name like '%alsace%'