<?php

namespace cinemaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use cinemaBundle\Entity\film;
use cinemaBundle\Form\filmType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class filmController extends Controller
{
    public function readAction()

    {

        $film = $this->getDoctrine()->getRepository(film::class)->findAll();
        return $this->render('@cinema/Default/read.html.twig', array('film' => $film));

    }
}
