<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 17/02/2019
 * Time: 15:27
 */

namespace e_commerceBundle\Entity;


namespace e_commerceBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="commande")
 */

class commande
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private  $valider;

    /**
     * @ORM\Column(type="integer")
     */
    private $reference;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\user" ,inversedBy="commandes")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private $user;

    /**
     * @var array
     *
     * @ORM\Column(name="commande", type="array")
     */
    private $commande;


    /**
     * @return mixed
     */
    public function getValider()
    {
        return $this->valider;
    }

    /**
     * @return array
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param array $commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
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
     * @param mixed $valider
     */
    public function setValider($valider)
    {
        $this->valider = $valider;
    }


    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
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



}