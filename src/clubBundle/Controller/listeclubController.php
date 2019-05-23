<?php

namespace clubBundle\Controller;


use clubBundle\Entity\club;
use clubBundle\Entity\listeclub;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class listeclubController extends Controller
{
    public function inscritAction($user,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository(club::class)->find($id);
        $liste= new listeclub();

        $club->setNbrparticipant($club->getNbrparticipant()+1);

        $liste->setClub($id);
        $liste->setMembres($user);

        $em->persist($liste);
        $em->flush();


        return $this->redirectToRoute("client_homepage");
    }

    public function membresAction($id){

        $em=$this->getDoctrine()->getManager();


        $club=$em->getRepository("clubBundle:listeclub")->mesmembres1DQL($id);

        return $this->render('@club/president/affichermembresclub.html.twig'
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