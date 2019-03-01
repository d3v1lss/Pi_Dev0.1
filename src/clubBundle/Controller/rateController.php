<?php

namespace cinemaBundle\Controller;

use cinemaBundle\Entity\rate;
use Symfony\Component\HttpFoundation\Request;
use cinemaBundle\Entity\film;
use cinemaBundle\Form\salleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class rateController extends Controller
{

    public function rateFilmAction($id , $user,$note)
    {
        $em = $this->getDoctrine()->getManager();
        $rate = new rate();


        $rate->setfilm($id);
        $rate->setIduser($user);
        $rate->setIduser($note);
        $em->persist($rate);
        $em->flush();
        return $this->redirectToRoute('readFilmGuest', array('user'=>$user,'id'=>$id,'note'=>$note));
    }



}
