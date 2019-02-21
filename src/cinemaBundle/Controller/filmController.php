<?php

namespace cinemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class filmController extends Controller
{
    public function readAction()

    {

        $film = $this->getDoctrine()->getRepository(film::class)->findAll();
        return $this->render('@cinema/Default/read.html.twig', array('film' => $film));

    }
}
