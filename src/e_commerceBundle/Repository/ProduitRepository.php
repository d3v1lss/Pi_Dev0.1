<?php

namespace e_commerceBundle\Repository;
use \Doctrine\ORM\EntityRepository;
/**
 * Class ProduitRepository
 * @package e_commerceBundle\Repository
 */

class ProduitRepository extends EntityRepository
{
    /**
     * @param
     * @return mixed
     */
    function findArray($array){

        $query = $this->createQueryBuilder('u')
            ->where('u.id IN(:array)')
            ->setParameter('array', $array)
            ->orderBy('u.id', 'ASC')
            ->getQuery();

        $produits = $query->getResult();
        return $produits;
    }


}
