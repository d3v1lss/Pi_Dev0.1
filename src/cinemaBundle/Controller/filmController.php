<?php

namespace cinemaBundle\Controller;

use cinemaBundle\Entity\favoris;
use Symfony\Component\HttpFoundation\Request;
use cinemaBundle\Entity\film;
use cinemaBundle\Form\filmType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class filmController extends Controller
{
    public function readAction()

    {

        $film = $this->getDoctrine()->getRepository(film::class)->findAll();
        return $this->render('@cinema/Default/read.html.twig', array('film' => $film));

    }

    public function readFilmGuestAction()

    {

        $film = $this->getDoctrine()->getRepository(film::class)->findAll();
        return $this->render('@cinema/Default/readFilmGuest.html.twig', array('film' => $film));

    }


    public function createAction(Request $request)

    {

        $film = new film();

        $form = $this->createForm(filmType::class, $film);

        $form = $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($film);
            $em->flush();


            return $this->redirectToRoute('readfilm');

        }
        return $this->render('@cinema/Default/ajout.html.twig', array('formulaire' => $form->createView()));

    }


    public function updateAction($id, Request $request)
    {
        $film = $this->getDoctrine()->getRepository(film::class)->find($id);

        $form = $this->createForm(filmType::class, $film);

        $form = $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {

            $em->flush();
            return $this->redirectToRoute('readfilm');
        }
        return $this->render('@cinema/Default/ajout.html.twig', array('formulaire' => $form->createView()));
    }




    public function deleteAction($id)
    {

        $em=$this->getDoctrine()->getManager();

        $film =$em->getRepository(film::class)->find($id);

        $em->remove($film);

        $em->flush();

        return $this->redirectToRoute('readfilm');
    }


    public function findNomDQLAction(){
        $em=$this->getDoctrine()->getManager();
        $nom=$em->getRepository("cinemaBundle:film")->findNomDQL();
        return $this->render('@cinema/Default/AfficheDQL.html.twig',array('nom'=>$nom));


    }

    public function findNomDQL2Action($nom){
        $em=$this->getDoctrine()->getManager();
        $nom=$em->getRepository("cinemaBundle:film")->findNomPara($nom);
        return $this->render('@cinema/Default/AfficheDQL.html.twig',array('film'=>$nom));


    }

    public function favorisFilmAction(){
        $favoris = new favoris();
        $form_favoris  = $this->createForm(new favorisType(), $favoris);
        $em=  $this->getDoctrine()->getEntityManager();
        $idfilm=$em->getRepository('cinemaBundle:film')->find(id);
        $iduser=$em->getRepository('AppBundle:user  ')->find(id);
        return array(
            'idfilm'=>$idfilm,
            'id user' => $ifuser,
            'form_personne'   => $form_personne->createView()
        );

    }



}
