<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 17/02/2019
 * Time: 15:23
 */

namespace bibliothequeBundle\Entity;


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
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\user" ,inversedBy="emprunt")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;
    /**
     * @ORM\ManyToOne(targetEntity="bibliothequeBundle\Entity\livre" ,inversedBy="emprunt")
     * @ORM\JoinColumn(name="livre_id",referencedColumnName="id")
     */
    private $livre;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getLivre()
    {
        return $this->livre;
    }

    /**
     * @param mixed $livre
     */
    public function setLivre($livre)
    {
        $this->livre = $livre;
    }
}