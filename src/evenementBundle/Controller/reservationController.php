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
        //   $em=$this->getDoctrine()->getManager();
        if($request->isMethod('POST')) {
            $reservation = new reservation();
            //   $user=$em->getRepository(user)->find($id);
            $user = $this->getUser();
            $reservation->setUser($user);


            $reservation->setNombrplaces($request->get('nombreplaces'));
            $reservation->setEvenement($this->getDoctrine()->getRepository(evenement::class)->find($request->get('evenement')));
            $em=$this->getDoctrine()->getManager();


            /*$evenement->setPhoto($request->get('photo'));*/
          //  dump($reservation);

            $em->persist($reservation);
            $em->flush();

          //  return $this->redirectToRoute("evenement_evenement_affuser");

        }
        $evenement = $this->getDoctrine()->getRepository(evenement::class)->findAll();

        // $evenement = $this->getDoctrine()->getRepository(evenement::class)->findAll();


        return $this->render('@evenement/reservation/ajouterreservation.html.twig',array(
            'evenement'=>$evenement
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