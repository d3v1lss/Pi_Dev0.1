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

class filmRepository extends EntityRepository
{



    public function findNomDQL()
    {

        $query = $this->getEntityManager()
            ->createQuery("Select m from cinemaBundle:film m WHERE m.nom='matrix'");
        return $query->getResult();


    }


    public function findNomPara($nom)
    {

        $query = $this->getEntityManager()
            ->createQuery("Select m from cinemaBundle:film m WHERE m.nom=:nom")
            ->setParameter('nom', $nom);
        return $query->getResult();


    }



}