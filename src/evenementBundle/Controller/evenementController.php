<?php

namespace evenementBundle\Controller;

use evenementBundle\Entity\evenement;
use evenementBundle\Entity\theme;
use evenementBundle\Form\evenementType;
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
            $evenement->setNombreplaces($request->get('nombreplaces'));
            $evenement->setDatedebut($request->get('datedebut'));
            $evenement->setDatefin($request->get('datefin'));
            $evenement->setDiscription($request->get('discription'));
            $evenement->setTheme($request->get('nom'));
            $evenement->setPhoto($request->get('photo'));

            $em=$this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute("evenement_evenement_ajouter");

            }
        $evenement = $this->getDoctrine()->getRepository(evenement::class)->findbyid();
        return $this->render('@evenement/evenement/ajouterevenement.html.twig',array(
            'evenement'=>$evenement
        ));

    }

    public function afficherevenementAction()
    {
        $evenement = $this->getDoctrine()->getRepository(evenement::class)->findAll();
        return $this->render('@evenement/evenement/afficherevenement.html.twig', array('evenement'=>$evenement));

    }

    public function supprimerevenementAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement_del=$em->getRepository(evenement::class)->find($id);
        {
            $em->remove($evenement_del);
            $em->flush();
            return $this->redirectToRoute("evenement_evenement_afficher");

        }
    }


    public function modifierevenementAction(Request $request,$id)
    {
        $em =$this->getDoctrine()->getManager();
        $evenement = $em->getRepository(evenement::class)->find($id);
        if ($request->isMethod('POST')) {
            $evenement->setNom($request->get('nom'));
            $evenement->setNombreplaces($request->get('nombreplaces'));
            $evenement->setDatedebut($request->get('datedebut'));
            $evenement->setDatefin($request->get('datefin'));
            $evenement->setDiscription($request->get('discription'));
            $evenement->setTheme($request->get('theme'));
            $evenement->setPhoto($request->get('photo'));
            $em->flush();

            return $this->redirectToRoute("evenement_evenement_afficher");

        }

        return $this->render('@evenement/theme/modifiertheme.html.twig', array(
            'evenement' => $evenement
        ));
    }

}
