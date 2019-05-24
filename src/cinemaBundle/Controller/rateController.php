<?php

namespace cinemaBundle\Controller;

use cinemaBundle\Entity\rate;
use cinemaBundle\Form\rateType;
use Symfony\Component\HttpFoundation\Request;
use cinemaBundle\Entity\film;
use cinemaBundle\Form\salleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class rateController extends Controller
{

    public function rateFilmAction(Request $request ,$nom,$id)
    {


        $rate = new rate();

        $rate->setFilm($nom);
        $rate->setIduser($id);

        $form1 = $this->createForm(rateType::class, $rate);

        $form1 = $form1->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form1->isValid()) {
            $em->persist($rate);
            $em->flush();


            return $this->redirectToRoute('readFilmClient');

        }
        return $this->render('@cinema/Default/rate.html.twig', array('formulaire' => $form1->createView()));
    }


    public function readAction()

    {

        $note = $this->getDoctrine()->getRepository(rate::class)->findAll();
        return $this->render('@cinema/Default/rateRes.html.twig', array('note' => $note));

    }



}
