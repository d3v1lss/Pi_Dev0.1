<?php

namespace cinemaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use cinemaBundle\Entity\salle;
use cinemaBundle\Form\salleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class salleController extends Controller
{
    public function readAction()

    {

        $salle = $this->getDoctrine()->getRepository(salle::class)->findAll();
        return $this->render('@cinema/Default/readsalle.html.twig', array('salle' => $salle));

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


            return $this->redirectToRoute('readsalle');

        }
        return $this->render('@cinema/Default/ajout.html.twig', array('formulaire' => $form->createView()));

    }


    public function updateAction($id, Request $request)
    {
        $salle = $this->getDoctrine()->getRepository(salle::class)->find($id);

        $form = $this->createForm(salleType::class, $salle);

        $form = $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {

            $em->flush();
            return $this->redirectToRoute('readsalle');
        }
        return $this->render('@cinema/Default/ajout.html.twig', array('formulaire' => $form->createView()));
    }

}