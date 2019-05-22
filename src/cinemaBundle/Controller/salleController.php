<?php

namespace cinemaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use cinemaBundle\Entity\salle;
use cinemaBundle\Form\salleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class salleController extends Controller
{
    public function readAction()

    {

        $salle = $this->getDoctrine()->getRepository(salle::class)->findAll();
        return $this->render('@cinema/Default/readsalle.html.twig', array('salle' => $salle));

    }


    public function readSalleGuestAction()

    {

        $salle = $this->getDoctrine()->getRepository(salle::class)->findAll();
        return $this->render('@cinema/Default/readSalleGuest.html.twig', array('salle' => $salle));

    }

    public function readSalleClientAction()

    {

        $salle = $this->getDoctrine()->getRepository(salle::class)->findAll();
        return $this->render('@cinema/Default/readSalleClient.html.twig', array('salle' => $salle));

    }

    public function createAction(Request $request)

    {

        $salle = new salle();

        $form = $this->createForm(salleType::class, $salle);

        $form = $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form->isValid()) {
            $em->persist($salle);
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


    public function deleteAction($id)
    {

        $em=$this->getDoctrine()->getManager();

        $salle =$em->getRepository(salle::class)->find($id);

        $em->remove($salle);

        $em->flush();

        return $this->redirectToRoute('readsalle');
    }



    public function allAction()
    {
        $tasks = $this->getDoctrine()->getManager()
            ->getRepository('cinemaBundle:salle')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($tasks);
        return new JsonResponse($formatted);
    }


    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $salle = new salle();
        $salle->setNom($request->get('nom'));
        $salle->setCapacite($request->get('capacite'));
        $em->persist($salle);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($salle);
        return new JsonResponse($formatted);
    }



    public function findAction($nom)
    {
        $nom = $this->getDoctrine()->getManager()
            ->getRepository('cinemaBundle:Salle')
            ->find($nom);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($nom);
        return new JsonResponse($formatted);
    }


}
