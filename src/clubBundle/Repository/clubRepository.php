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
    public function monclubDQL($username){

        $query=$this->getEntityManager()
            ->createQuery("Select c from clubBundle:club c WHERE c.president= :username")
        ->setParameter('username',$username);
        return $query->getResult();


    }

    public function workshopDQL($username){

        $query=$this->getEntityManager()
            ->createQuery("Select w from clubBundle:workshop w WHERE w.president= :username")
            ->setParameter('username',$username);
        return $query->getResult();


    }

    public function userDQL($username){

        $query=$this->getEntityManager()
            ->createQuery("Select u from userBundle:user u WHERE u.username= :username")
            ->setParameter('username',$username);
        return $query->getResult();


    }


}