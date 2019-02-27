<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 27/02/2019
 * Time: 04:41
 */

namespace clubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * Conseil
 *
 * @ORM\Table(name="listeworkshop")
 * @ORM\Entity(repositoryClass="clubBundle\Repository\listeclubRepository")
 */

class listeworkshop
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
    private $workshop;

    /**
     * @ORM\Column(type="string")
     */
    private $membres;

    /**
     * @return mixed
     */
    public function getWorkshop()
    {
        return $this->workshop;
    }

    /**
     * @param mixed $workshop
     */
    public function setWorkshop($workshop)
    {
        $this->workshop = $workshop;
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
    public function getMembres()
    {
        return $this->membres;
    }

    /**
     * @param mixed $membres
     */
    public function setMembres($membres)
    {
        $this->membres = $membres;
    }

}