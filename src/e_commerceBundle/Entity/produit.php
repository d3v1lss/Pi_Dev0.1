<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 17/02/2019
 * Time: 15:27
 */

namespace e_commerceBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="e_commerceBundle\Repository\ProduitRepository")
 * @ORM\Table(name="produit")
 */

class produit
{/**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO")
 */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;
    /**
     * @ORM\Column(type="float")
     */
    private $prix;
    /**
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @ORM\Column(type="string")
     */
    private $photo;
    /**
     * @var bool
     *
     * @ORM\Column(name="disponible", type="boolean")
     */
    private $disponible;
    /**
     * @ORM\ManyToOne(targetEntity="e_commerceBundle\Entity\tva" ,inversedBy="produits")
     * @ORM\JoinColumn(name="tva_id",referencedColumnName="id")
     */
    private $tva;
    /**
     * @ORM\OneToMany(targetEntity="e_commerceBundle\Entity\commande" ,mappedBy="produit")

     */
    private $commandes;


    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }
    /**
     * @return mixed
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * @param mixed $tva
     */
    public function setTva($tva)
    {
        $this->tva = $tva;
    }

    /**
     * @return mixed
     */

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
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * @param mixed $disponible
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;
    }


}