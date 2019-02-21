<?php

namespace evenementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class evenementController extends Controller
{

    public function ajouterevenementAction()
    {
        return $this->render('@evenement/evenement/ajouterevenement.html.twig', array(
            // ...
        ));
    }

    public function afficherevenementAction()
    {
        return $this->render('@evenement/evenement/afficherevenement.html.twig', array(
            // ...
        ));
    }

    public function supprimerevenementAction()
    {
        return $this->render('@evenement/evenement/supprimerevenement.html.twig', array(
            // ...
        ));
    }


    public function modifierevenementAction()
    {
        return $this->render('@evenement/evenement/modifierevenement.html.twig', array(
            // ...
        ));
    }

}
