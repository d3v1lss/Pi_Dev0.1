<?php
/**
 * Created by PhpStorm.
 * User: HCHAICHI
 * Date: 20/02/2019
 * Time: 03:54
 */

namespace forumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Conseil
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity
 */

class commentaire
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
    private $contenu;

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
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
    /**
     * @ORM\ManyToOne(targetEntity="forumBundle\Entity\publication" ,inversedBy="commentaires")
     * @ORM\JoinColumn(name="publication_id",referencedColumnName="id")
     */
    private $publication;

    /**
     * @return mixed
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * @param mixed $publication
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;
    }
}