<?php

namespace evenementBundle\Controller;

use evenementBundle\Entity\evenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class evenementController extends Controller
{

    public function ajouterevenementAction(Request $request)
    {
        if($request->isMethod('POST')) {
            $evenement = new evenement();
            $evenement->setNom($request->get('nom'));
            $evenement->setNom($request->get('discription'));
            $evenement->setNom($request->get('nombreplaces'));
            $evenement->setNom($request->get('photo'));
            $evenement->setNom($request->get('datedebut'));
            $evenement->setNom($request->get('datefin'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
        }
        $theme = $this->getDoctrine()->getRepository(evenement::class)->findAll();
        return $this->render('@evenement/evenement/ajouterevenement.html.twig',array(
            'evenement'=>$evenement
        ));

    }

    public function afficherevenementAction()
    {
        $evenement = $this->getDoctrine()->getRepository(evenement::class)->findAll();
        return $this->render('@evenement/evenement/afficherevenement.html.twig', array('evenement'=>$evenement));

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
