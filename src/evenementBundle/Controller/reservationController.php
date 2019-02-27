<?php

namespace evenementBundle\Controller;

use AppBundle\Entity\user;
use evenementBundle\Entity\evenement;
use evenementBundle\Entity\reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class reservationController extends Controller
{

    public function ajouterreservationAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $reservation = new reservation();
         //   $reservation->setNom($request->get('nom'));

            $reservation->setEvenement($this->getDoctrine()->getRepository(evenement::class)->find($request->get('evenement')));


            /*$evenement->setPhoto($request->get('photo'));*/
            // dump($evenement);
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            //return $this->redirectToRoute("evenement_evenement_afficher");

        }
        // $theme = $this->getDoctrine()->getRepository(theme::class)->findAll();

        $reservation = $this->getDoctrine()->getRepository(reservation::class)->findAll();


        return $this->render('@evenement/reservation/ajouterreservation.html.twig', array(
            'reservation' => $reservation
        ));
    }


    public function afficherreservationAction()
    {
        return $this->render('@evenement:reservation:afficherreservation.html.twig', array(// ...
        ));
    }


    public function modifierreservationAction()
    {
        return $this->render('@evenement:reservation:modifierreservation.html.twig', array(// ...
        ));
    }


    public function supprimerreservationAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository(reservation::class)->find($id);
        {
            $em->remove($reservation);
            $em->flush();
            return $this->redirectToRoute("evenement_evenement_afficher");

        }

    }
}