<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 26/02/2019
 * Time: 23:19
 */

namespace clubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * Conseil
 *
 * @ORM\Table(name="listeclub")
 * @ORM\Entity(repositoryClass="clubBundle\Repository\listeclubRepository")
 */

class listeclub
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club)
    {
        $this->club = $club;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $club;

    /**
     * @ORM\Column(type="string")
     */
    private $membres;

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
    public function getMembres()
    {
        return $this->membres;
    }

    /**
     * @param mixed $membres
     */
    public function setMembres($membres)
    {
        $this->membres = $membres;
    }

}