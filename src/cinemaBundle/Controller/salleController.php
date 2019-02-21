<?php

namespace cinemaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function readAction()

    {

        $model = $this->getDoctrine()->getRepository(Modele::class)->findAll();
        return $this->render('@EspritParc/Modele/read.html.twig', array('mod' => $model));

    }
}
