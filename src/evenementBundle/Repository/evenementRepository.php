<?php
/**
 * Created by PhpStorm.
 * User: Rania Nouira
 * Date: 2/26/2019
 * Time: 6:11 AM
 */

namespace evenementBundle\Repository;


class evenementRepository extends \Doctrine\ORM\EntityRepository
{
     public function findbyid (){
         $query = $this->getEntityManager()
             ->createQuery("SELECT m FROM evenementBundle:theme m ")
             ->getResult();
     }
}