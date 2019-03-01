<?php

namespace clubBundle\Controller;


use clubBundle\Entity\workshop;
use clubBundle\Entity\listeworkshop;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class listeworkshopController extends Controller
{
    public function inscritAction($user,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $workshop = $em->getRepository(workshop::class)->find($id);
        $nb=$workshop->getNombreplaces();

        if ($nb>0){     $liste= new listeworkshop();
            $workshop->setNombreplaces($workshop->getNombreplaces()-1);
            $liste->setWorkshop($id);
            $liste->setMembres($user);

            $em->persist($liste);
            $em->flush();


            return $this->redirectToRoute("user_homepage");}
    else{


        return $this->redirectToRoute("admin_homepage");}
    }


    public function membresAction($id){
        $em=$this->getDoctrine()->getManager();


        $club=$em->getRepository("clubBundle:listeclub")->mesmembres2DQL($id);

        return $this->render('@club/president/affichermembresworkshop.html.twig'
            ,array('club'=>$club));


    }

    public function suppAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository(listeclub::class)->find($id);

        $em->remove($club);
        $em->flush();
        return $this->redirectToRoute("president_homepage");
    }
}