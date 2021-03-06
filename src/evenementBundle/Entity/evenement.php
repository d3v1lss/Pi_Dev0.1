<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 17/02/2019
 * Time: 15:28
 */

namespace evenementBundle\Entity;


namespace evenementBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="evenement")
 */
class evenement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    private  $nom;
    /**
     * @ORM\Column(type="string")
     */
    private  $photo;
    /**
     * @ORM\Column(type="string")
     */
    private $discription;
    /**
     * @ORM\Column(type="integer")
     */
    private $nombreplaces;

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
    /**

    @ORM\Column(type="date")
     */

    private $datedebut;
    /**

    @ORM\Column(type="date")
     */

    private $datefin;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\user" ,inversedBy="evenements")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;
    /**
     * @ORM\OneToMany(targetEntity="evenementBundle\Entity\reservation" ,mappedBy="evenement")

     */
    private $reservations;
    /**
     * @ORM\ManyToOne(targetEntity="evenementBundle\Entity\theme" ,inversedBy="evenements")
     * @ORM\JoinColumn(name="theme_id",referencedColumnName="id")
     */
    private $theme;

    /**
     * @return mixed
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * @param mixed $reservations
     */
    public function setReservations($reservations)
    {
        $this->reservations = $reservations;
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    public function __construct()
    {

        $this->reservations = new ArrayCollection();
    }
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDiscription()
    {
        return $this->discription;
    }

    /**
     * @param mixed $discription
     */
    public function setDiscription($discription)
    {
        $this->discription = $discription;
    }

    /**
     * @return mixed
     */
    public function getNombreplaces()
    {
        return $this->nombreplaces;
    }

    /**
     * @param mixed $nombreplaces
     */
    public function setNombreplaces($nombreplaces)
    {
        $this->nombreplaces = $nombreplaces;
    }

    /**
     * @return mixed
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return mixed
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

}