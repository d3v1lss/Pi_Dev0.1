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
     public function findbyid ($id){
         $query = $this->getEntityManager()
             ->createQuery("SELECT m FROM evenementBundle:evenement m WHERE m.user=:id ")
             ->setParameter('id',$id);
           return $query->getResult();
     }

    public function findBytheme ($theme)
    {
        $query=$this->getEntityManager()->
        createQuery("SELECT evenement FROM evenementBundle:evenement evenement  WHERE evenement.theme=:theme")
            ->setParameter('theme',$theme);
        return $query->getResult();

    }
    public function findBynom ($nom)
    {
        $query=$this->getEntityManager()->
        createQuery("SELECT evenement FROM evenementBundle:evenement evenement  WHERE evenement.nom='$nom'");
        return $query->getResult();

    }
}
