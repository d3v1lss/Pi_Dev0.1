<?php

namespace cinemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * avis
 *
 * @ORM\Table(name="avis")
 * @ORM\Entity(repositoryClass="cinemaBundle\Repository\avisRepository")
 */
class avis
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="avischoix", type="string", length=255)
     */
    private $avischoix;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set avischoix
     *
     * @param string $avischoix
     *
     * @return avis
     */
    public function setAvischoix($avischoix)
    {
        $this->avischoix = $avischoix;

        return $this;
    }

    /**
     * Get avischoix
     *
     * @return string
     */
    public function getAvischoix()
    {
        return $this->avischoix;
    }

    public function setNom($get)
    {
    }
}