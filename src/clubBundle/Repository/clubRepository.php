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
class clubRepository  extends EntityRepository
{
    public function monclubDQL($id){

        $query=$this->getEntityManager()
            ->createQuery("Select c from clubBundle:club c WHERE c.president= :id")
        ->setParameter('id',$id);
        return $query->getResult();


    }

    public function workshopDQL($id){

        $query=$this->getEntityManager()
            ->createQuery("Select w from clubBundle:workshop w WHERE w.user= :id")
            ->setParameter('id',$id);
        return $query->getResult();


    }


}