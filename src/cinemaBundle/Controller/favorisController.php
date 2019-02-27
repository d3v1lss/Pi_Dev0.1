<?php

namespace cinemaBundle\Controller;

use cinemaBundle\Entity\favoris;
use Symfony\Component\HttpFoundation\Request;
use cinemaBundle\Entity\salle;
use cinemaBundle\Form\salleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class favorisController extends Controller
{
    public function readAction()

    {

        $favoris = $this->getDoctrine()->getRepository(favoris::class)->findAll();
        return $this->render('@cinema/Default/favoris.html.twig', array('favoris' => $favoris));

    }


    public function favorisFilmAction($id , $user)
    {
        $em = $this->getDoctrine()->getManager();
        $favoris = new favoris();


        $favoris->setfilm($id);
        $favoris->setIduser($user);
        $em->persist($favoris);
        $em->flush();

    }


    public function deleteAction($id)
    {

        $em=$this->getDoctrine()->getManager();

        $favoris =$em->getRepository(favoris::class)->find($id);

        $em->remove($favoris);

        $em->flush();

        return $this->redirectToRoute('favorisfilm');
    }
}
