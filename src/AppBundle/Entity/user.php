<?php


namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class user extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")

     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    private  $nom;

    /**
     * @return mixed
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue
     */
    private $prenom;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */


    private $date;

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
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
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getClubs()
    {
        return $this->clubs;
    }

    /**
     * @param mixed $clubs
     */
    public function setClubs($clubs)
    {
        $this->clubs = $clubs;
    }

    /**
     * @return mixed
     */
    public function getWorkshops()
    {
        return $this->workshops;
    }

    /**
     * @param mixed $workshops
     */
    public function setWorkshops($workshops)
    {
        $this->workshops = $workshops;
    }

    /**
     * @return mixed
     */
    public function getEmprunts()
    {
        return $this->emprunts;
    }

    /**
     * @param mixed $emprunts
     */
    public function setEmprunts($emprunts)
    {
        $this->emprunts = $emprunts;
    }

    /**
     * @return mixed
     */
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * @param mixed $films
     */
    public function setFilms($films)
    {
        $this->films = $films;
    }

    /**
     * @return mixed
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * @param mixed $commandes
     */
    public function setCommandes($commandes)
    {
        $this->commandes = $commandes;
    }

    /**
     * @return mixed
     */
    public function getEvenements()
    {
        return $this->evenements;
    }

    /**
     * @param mixed $evenements
     */
    public function setEvenements($evenements)
    {
        $this->evenements = $evenements;
    }

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
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * @param mixed $publications
     */
    public function setPublications($publications)
    {
        $this->publications = $publications;
    }


    /**
     * @return mixed
     * @ORM\Column(type="boolean")
     */
    private $sexe;

    /**
     * @return mixed
     * @ORM\Column(type="string")
     */
    private $numero;

    /**
     * @return mixed
     * @ORM\Column(type="string",length=255)
     */
    private $adresse;
    /**
     * @ORM\Column(type="string")
     */
    private  $biographie;

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getBiographie()
    {
        return $this->biographie;
    }

    /**
     * @param mixed $biographie
     */
    public function setBiographie($biographie)
    {
        $this->biographie = $biographie;
    }
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

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



    /**
     * @ORM\OneToMany(targetEntity="clubBundle\Entity\club" ,mappedBy="user")

     */
    private $clubs;
    /**
     * @ORM\OneToMany(targetEntity="clubBundle\Entity\workshop" ,mappedBy="user")

     */
    private $workshops;
    /**
     * @ORM\OneToMany(targetEntity="bibliothequeBundle\Entity\emprunt" ,mappedBy="user")

     */
    private $emprunts;

    /**
     * @ORM\OneToMany(targetEntity="cinemaBundle\Entity\film" ,mappedBy="user")

     */
    private $films;

    /**
     * @ORM\OneToMany(targetEntity="e_commerceBundle\Entity\commande" ,mappedBy="user")

     */
    private $commandes;
    /**
     * @ORM\OneToMany(targetEntity="evenementBundle\Entity\evenement" ,mappedBy="user")

     */
    private $evenements;

    /**
     * @ORM\OneToMany(targetEntity="evenementBundle\Entity\reservation" ,mappedBy="user")

     */
    private $reservations;



    /**
     * @ORM\OneToMany(targetEntity="forumBundle\Entity\publication" ,mappedBy="user")

     */
    private $publications;
}