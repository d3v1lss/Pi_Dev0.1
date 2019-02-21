<?php

namespace evenementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class themeController extends Controller
{

    public function ajouterthemeAction()
    {
        return $this->render('@evenement/theme/ajoutertheme.html.twig', array(
            // ...
        ));
    }


    public function afficherthemeAction()
    {
        return $this->render('@evenement/theme/affichertheme.html.twig', array(
            // ...
        ));
    }


    public function modifierthemeAction()
    {
        return $this->render('@evenement/theme/modifiertheme.html.twig', array(
            // ...
        ));
    }


    public function supprimerthemeAction()
    {
        return $this->render('@evenement/theme/supprimertheme.html.twig', array(
            // ...
        ));
    }

}
