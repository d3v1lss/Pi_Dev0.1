<?php

namespace cinemaBundle\Controller;

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
}
