<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 17/02/2019
 * Time: 13:49
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="emprunt")
 */

class emprunt
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**

    @ORM\Column(type="date")
     */

    private $dateEmprunt;
    /**

    @ORM\Column(type="date")
     */

    private $dateretour;

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
    public function getDateEmprunt()
    {
        return $this->dateEmprunt;
    }

    /**
     * @param mixed $dateEmprunt
     */
    public function setDateEmprunt($dateEmprunt)
    {
        $this->dateEmprunt = $dateEmprunt;
    }

    /**
     * @return mixed
     */
    public function getDateretour()
    {
        return $this->dateretour;
    }

    /**
     * @param mixed $dateretour
     */
    public function setDateretour($dateretour)
    {
        $this->dateretour = $dateretour;
    }

}