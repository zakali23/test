<?php

namespace AppBundle\Repository;

/**
 * PieceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PieceRepository extends \Doctrine\ORM\EntityRepository
{
    public function findPiecesById($id){
        $fields = array('p.id', 'p.nom', 'p.surface','p.photo');
        return $this->createQueryBuilder('p')
            ->select($fields)
            ->andWhere('p.room = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findLotsByAdresseAndId($adresse,$id){
        $fields = array('p.id', 'p.nom', 'p.surface','p.photo');
        return $this->createQueryBuilder('p')
            ->select($fields)
            ->andWhere('p.room =:id')
            ->setParameter('id',$id)
            ->andWhere('p.nom LIKE :adresse')
            ->setParameter('adresse', '%'.$adresse.'%')
            ->getQuery()
            ->getResult()
            ;
    }
}
