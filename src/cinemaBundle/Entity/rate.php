<?php

namespace cinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * rate
 *
 * @ORM\Table(name="rate")
 * @ORM\Entity(repositoryClass="cinemaBundle\Repository\favorisRepository")
 */
class rate
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
     * @ORM\Column(type="string")
     */

    private $film;



    /**
     * @ORM\Column(type="integer")
     */
    private $note;

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
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }




}

