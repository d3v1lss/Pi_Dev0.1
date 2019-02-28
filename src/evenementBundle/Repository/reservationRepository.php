<?php
/**
 * Created by PhpStorm.
 * User: Rania Nouira
 * Date: 2/26/2019
 * Time: 6:11 AM
 */

namespace evenementBundle\Repository;


class reservationRepository extends \Doctrine\ORM\EntityRepository
{
    public function findbyid($id)
    {
        $query = $this->getEntityManager()
            ->createQuery("SELECT m FROM evenementBundle:reservation m WHERE m.user=:id ")
            ->setParameter('id', $id);
        return $query->getResult();
    }




}