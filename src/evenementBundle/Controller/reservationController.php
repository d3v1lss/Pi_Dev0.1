<?php

namespace evenementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class reservationController extends Controller
{

    public function ajouterreservationAction()
    {
        return $this->render('@evenement:reservation:ajouterreservation.html.twig', array(
            // ...
        ));
    }


    public function afficherreservationAction()
    {
        return $this->render('@evenement:reservation:afficherreservation.html.twig', array(
            // ...
        ));
    }


    public function modifierreservationAction()
    {
        return $this->render('@evenement:reservation:modifierreservation.html.twig', array(
            // ...
        ));
    }


    public function supprimerreservationAction()
    {
        return $this->render('@evenement:reservation:supprimerreservation.html.twig', array(
            // ...
        ));
    }

}
