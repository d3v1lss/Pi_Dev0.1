<?php

namespace clubBundle\Controller;

use clubBundle\Entity\workshop;


use clubBundle\Form\workshopType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class workshopController extends Controller
{
    public function indexAction()
    {

        return $this->render('@club/Default/afficherclub.html.twig');
    }



    public function afficher2Action()
    {

        $workshop = $this->getDoctrine()->getRepository(workshop::class)->findALL();
        return $this->render('@club/back/workshop.html.twig',
            array("workshop" => $workshop));
    }

    public function afficher1Action()
    {

        $workshop = $this->getDoctrine()->getRepository(workshop::class)->findALL();
        return $this->render('@club/workshop/afficherworkshop.html.twig',
            array("workshop" => $workshop));
    }

    public function afficher3Action()
    {

        $workshop = $this->getDoctrine()->getRepository(workshop::class)->findALL();
        return $this->render('@club/workshop/afficherworkshopuser.html.twig',
            array("workshop" => $workshop));
    }
    public function addAction(Request $request)
    {

        $workshop = new workshop();
        $form = $this->createForm(workshopType::class, $workshop);
        $form = $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {


            $em->persist($workshop);
            $em->flush();


            return $this->redirectToRoute('president_homepage');
        }
        return $this->render('@club/workshop/ajouterworkshop.html.twig',
            array('form' => $form->createView()));
    }
    public function suppAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $workshop = $em->getRepository(workshop::class)->find($id);

        $em->remove($workshop);
        $em->flush();
        return $this->redirectToRoute("president_homepage");
    }

    public function updateAction($id, Request $request)
    {
        $workshop = $this->getDoctrine()->getRepository(workshop::class)->find($id);
        $form = $this->createForm(workshopType::class, $workshop);
        $form = $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('president_homepage');
        }
        return $this->render('@club/workshop/updateworkshop.html.twig', array('form' => $form->createView()));

    }

    /**
     * @param $username
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function workshopAction($username){
        $em=$this->getDoctrine()->getManager();



        $workshop=$em->getRepository("clubBundle:club")->workshopDQL($username);

        return $this->render('@club/president/afficherworkshoppresident.html.twig'
            ,array('workshop'=>$workshop));


    }

    public function allAction()
    {
        $workshop = $this->getDoctrine()->getManager()
            ->getRepository('clubBundle:workshop')
            ->findAll();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($workshop);
        return new JsonResponse($formatted);
    }
}
