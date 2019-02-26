<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 17/02/2019
 * Time: 15:24
 */

namespace cinemaBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="cinemaBundle\Repository\filmRepository")

 */
class favoris
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;



    /**
     * @ORM\ManyToOne(targetEntity="film")
     * @ORM\JoinColumn(name="film_id",referencedColumnName="id")
     */
    private $idfilm;

    /**
     * @ORM\ManyToOne(targetEntity="salle")
     * @ORM\JoinColumn(name="salle_id",referencedColumnName="id")
     */
    private $idsalle;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdfilm()
    {
        return $this->idfilm;
    }

    /**
     * @param mixed $idfilm
     */
    public function setIdfilm($idfilm)
    {
        $this->idfilm = $idfilm;
    }

    /**
     * @return mixed
     */
    public function getIdsalle()
    {
        return $this->idsalle;
    }

    /**
     * @param mixed $idsalle
     */
    public function setIdsalle($idsalle)
    {
        $this->idsalle = $idsalle;
    }




}