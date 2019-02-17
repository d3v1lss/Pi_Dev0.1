<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 17/02/2019
 * Time: 15:29
 */

namespace evenementBundle\Entity;



use Doctrine\ORM\Mapping as ORM;
/**
 * Conseil
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class reservation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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

}