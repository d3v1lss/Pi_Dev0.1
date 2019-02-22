<?php

namespace clubBundle\Controller;

use clubBundle\Entity\club;
use clubBundle\Form\clubType;
use clubBundle\Form\rechercherclubType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class clubController extends Controller
{

    public function afficher1Action()
    {

        $club = $this->getDoctrine()->getRepository(club::class)->findALL();
        return $this->render('@club/club/afficherclub.html.twig', array("club" => $club));
    }

    public function afficher2Action()
    {

        $club = $this->getDoctrine()->getRepository(club::class)->findALL();
        return $this->render('@club/back/club.html.twig', array("club" => $club));
    }

    public function afficher3Action()
    {

        $club = $this->getDoctrine()->getRepository(club::class)->findALL();
        return $this->render('@club/club/afficherclub.html.twig', array("club" => $club));
    }

    public function addAction(Request $request)
    {

        $club = new club();
        $form = $this->createForm(clubType::class, $club);
        $form = $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {

    $club->setStatut('non');
    $club->setNbrparticipant(0);
            $em->persist($club);
            $em->flush();


            return $this->redirectToRoute('afficher_club_president');
        }
        return $this->render('@club/club/ajouterclub.html.twig', array('form' => $form->createView()));
    }

    public function supp1Action($id)
    {

        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository(club::class)->find($id);

        $em->remove($club);
        $em->flush();
        return $this->redirectToRoute("afficher_club_president");
    }
    public function supp2Action($id)
    {

        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository(club::class)->find($id);

        $em->remove($club);
        $em->flush();
        return $this->redirectToRoute("afficher_club_admin");
    }
    public function update1Action($id, Request $request)
    {
        $club = $this->getDoctrine()->getRepository(club::class)->find($id);
        $form = $this->createForm(clubType::class, $club);
        $form = $form->handleRequest($request);
        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('afficher_club_president');
        }
        return $this->render('@club/president/updateclubpresident.html.twig',
            array('form' => $form->createView()));

    }

    public function update2Action($id, Request $request)
    {
        $club = $this->getDoctrine()->getRepository(club::class)->find($id);
        $form = $this->createForm(clubType::class, $club);
        $form = $form->handleRequest($request);
        if ($form->isValid()) {
            $club->setStatut('oui');
            $em = $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('afficher_club_admin');
        }
        return $this->render('@club/club/updateclub.html.twig',
            array('form' => $form->createView()));

    }
    public function rechercherAction(Request $request)
    {

        $club = new club();
        $form = $this->createForm(rechercherclubType::class, $club);
        $form = $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $club= $this->getDoctrine()->getRepository(club::class)
                ->findBy(array('activite' => $club->getActivite()));

        }
        else{
            $club= $this->getDoctrine()->getRepository(club::class)
                ->findAll();

        }
        return $this->render('@club/club/rechercherclub.html.twig', array('form' =>
            $form->createView(),'club'=>$club));
    }

    public function MonclubAction(){
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository("clubBundle:club")->monclubDQL();
        return $this->render('@club/president/afficherclubpresident.html.twig',array('club'=>$club));


    }
}
