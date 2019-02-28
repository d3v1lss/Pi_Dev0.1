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

    function findNom($nom)
    {
        $query=$this->getEntityManager()
            ->createQuery("
            select l from e_commerceBundle:produit p where p.nom LIKE :nom")
            ->setParameter('nom','%'.$nom.'%');
        return $query->getResult();
    }

}
