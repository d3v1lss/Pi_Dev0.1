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
 * Conseil
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity
 */
class theme
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
     * theme constructor.
     * @param $themes
     */
    public function __construct()
    {
        $this->evenements = new ArrayCollection();
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
     * Add evenement
     *
     * @param \evenementBundle\Entity\evenement $evenement
     *
     * @return theme
     */
    public function addEvenement(\evenementBundle\Entity\evenement $evenement)
    {
        $this->evenements[] = $evenement;

        return $this;
    }

    /**
     * Remove evenement
     *
     * @param \evenementBundle\Entity\evenement $evenement
     */
    public function removeEvenement(\evenementBundle\Entity\evenement $evenement)
    {
        $this->evenements->removeElement($evenement);
    }
}
