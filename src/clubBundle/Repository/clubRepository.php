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
    public function monclubDQL(){

        $query=$this->getEntityManager()
            ->createQuery("Select c from clubBundle:club c WHERE c.president='4'");
        return $query->getResult();


    }
}