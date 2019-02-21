<?php

namespace cinemaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use cinemaBundle\Entity\salle;
use cinemaBundle\Form\salleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class salleController extends Controller
{
    public function readAction()

    {

        $salle = $this->getDoctrine()->getRepository(salle::class)->findAll();
        return $this->render('@cinema/Default/readsalle.html.twig', array('salle' => $salle));

    }
}
