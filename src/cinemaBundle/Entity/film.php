<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 17/02/2019
 * Time: 15:24
 */

namespace cinemaBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass="cinemaBundle\Repository\filmRepository")
 * @Vich\Uploadable
 */
class film
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
     * @ORM\Column(type="string")
     */
    private $discription;
    /**
     * @ORM\Column(type="string")
     */
    private $duree;
    /**
     * @ORM\Column(type="string")
     */
    private $categorie;
    /**

    @ORM\Column(type="date")
     */

    private $datesotie;


    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return mixed
     */
    public function getDatesotie()
    {
        return $this->datesotie;
    }

    /**
     * @param mixed $datesotie
     */
    public function setDatesotie($datesotie)
    {
        $this->datesotie = $datesotie;
    }




    /**
     * @return mixed
     */

}