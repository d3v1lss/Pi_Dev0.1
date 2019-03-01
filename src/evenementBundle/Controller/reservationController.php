<?php

namespace evenementBundle\Controller;

use AppBundle\Entity\user;
use evenementBundle\Entity\evenement;
use evenementBundle\Entity\reservation;
use evenementBundle\Repository\reservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class reservationController extends Controller
{

    public function ajouterreservationAction(Request $request)
    {
        //   $em=$this->getDoctrine()->getManager();
        if($request->isMethod('POST')) {
            $reservation = new reservation();
            //   $user=$em->getRepository(user)->find($id);
            $user = $this->getUser();
            $reservation->setUser($user);


           // $reservation->setNombrplaces($request->get('nombreplaces'));
            $reservation->setEvenement($this->getDoctrine()->getRepository(evenement::class)->find($request->get('evenement')));
            $em=$this->getDoctrine()->getManager();

            $event = $this->getDoctrine()->getRepository(evenement::class)->find($request->get('evenement'));
            if($event->getNombrePlaces() <= $this->getDoctrine()->getRepository(reservation::class)->countReservations($request->get('evenement'))){

                $evenement = $this->getDoctrine()->getRepository(evenement::class)->findAll();

                $errors = "Y'a pas de places , on est deja ".' '.$event->getNombrePlaces();
                return $this->render('@evenement/reservation/ajouterreservation.html.twig',array(
                    'evenement'=>$evenement,
                    'errors'=>$errors
                ));

            }

            /*$evenement->setPhoto($request->get('photo'));*/
          //  dump($reservation);

            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute("evenement_reservation_afficher");

        }
        $evenement = $this->getDoctrine()->getRepository(evenement::class)->findAll();

        // $evenement = $this->getDoctrine()->getRepository(evenement::class)->findAll();


        return $this->render('@evenement/reservation/ajouterreservation.html.twig',array(
            'evenement'=>$evenement
        ));
    }





    public function afficherreservationAction()
    {
        $reservation = $this->getDoctrine()->getRepository(reservation::class)->findbyid($this->getUser()->getId());
        return $this->render('@evenement/reservation/afficherreservation.html.twig', array('reservation'=>$reservation));

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
            return $this->redirectToRoute("evenement_reservation_afficher");

        }

    }
}