<?php

namespace cinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * favoris
 *
 * @ORM\Table(name="favoris")
 * @ORM\Entity(repositoryClass="cinemaBundle\Repository\favorisRepository")
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
     * @ORM\Column(type="string")
     */
    private $iduser;

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
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * @param mixed $iduser
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    /**
     * @return mixed
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @param mixed $film
     */
    public function setFilm($film)
    {
        $this->film = $film;
    }

    /**
     * @ORM\Column(type="string")
     */

    private $film;


}

