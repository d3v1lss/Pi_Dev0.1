<?php
/**
 * Created by PhpStorm.
 * User: Houssem
 * Date: 21/02/2019
 * Time: 7:51 PM
 */

namespace cinemaBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class favorisRepository extends  EntityRepository
{


    public function liste($id){

        $query=$this->getEntityManager()
            ->createQuery("Select c from cinemaBundle:favoris c WHERE c.iduser = : id")
            ->setParameter('id',$id);
        return $query->getResult();


    }





}