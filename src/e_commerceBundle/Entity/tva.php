<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 20/02/2019
 * Time: 03:46
 */

namespace e_commerceBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tva")
 */
class tva
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
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $valeur;
    /**
     * @ORM\Column(type="float")
     */
    private $multiplicate;

    /**
     * @ORM\OneToMany(targetEntity="e_commerceBundle\Entity\produit" ,mappedBy="tva")

     */
    private $produits;
    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }
    /**
     * @return mixed
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * @param mixed $produits
     */
    public function setProduits($produits)
    {
        $this->produits = $produits;
    }

    /**
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param mixed $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
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
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param mixed $valeur
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

    /**
     * @return mixed
     */
    public function getMultiplicate()
    {
        return $this->multiplicate;
    }

    /**
     * @param mixed $multiplicate
     */
    public function setMultiplicate($multiplicate)
    {
        $this->multiplicate = $multiplicate;
    }


}