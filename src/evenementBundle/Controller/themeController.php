<?php

namespace evenementBundle\Controller;

use evenementBundle\Entity\theme;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class themeController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajouterthemeAction(Request $request)
    {
        if($request->isMethod('POST')) {
            $theme = new theme();
            $theme->setNom($request->get('nom'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($theme);
            $em->flush();
        }
        $theme = $this->getDoctrine()->getRepository(theme::class)->findAll();
        return $this->render('@evenement/theme/affichertheme.html.twig',array(
            'theme'=>$theme
        ));
    }


    public function afficherthemeAction()
    {

        $theme = $this->getDoctrine()->getRepository(theme::class)->findAll();
        return $this->render('@evenement/theme/affichertheme.html.twig', array('theme'=>$theme));

    }


    public function modifierthemeAction()
    {
        return $this->render('@evenement/theme/modifiertheme.html.twig', array(
            // ...
        ));
    }


    public function supprimerthemeAction()
    {
        return $this->render('@evenement/theme/supprimertheme.html.twig', array(
            // ...
        ));
    }

}
