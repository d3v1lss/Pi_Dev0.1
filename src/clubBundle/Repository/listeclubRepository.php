<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 22/02/2019
 * Time: 03:31
 */

namespace clubBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
class listeclubRepository  extends EntityRepository
{
    public function mesmembres1DQL($id){

        $query=$this->getEntityManager()
            ->createQuery("Select c from clubBundle:listeclub c WHERE c.club= :id")
            ->setParameter('id',$id);
        return $query->getResult();


    }
    public function mesmembres2DQL($id){

        $query=$this->getEntityManager()
            ->createQuery("Select w from clubBundle:listeworkshop w WHERE w.workshop= :id")
            ->setParameter('id',$id);
        return $query->getResult();


    }
}