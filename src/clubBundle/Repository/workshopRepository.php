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


class workshopRepository  extends EntityRepository
{
    public function workshopDQL($username){

        $query=$this->getEntityManager()
            ->createQuery("Select w from clubBundle:workshop w WHERE w.president= :$username")
            ->setParameter('username',$username);
        return $query->getResult();


    }
}