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
        return $this->render('@evenement/theme/ajoutertheme.html.twig',array(
            'theme'=>$theme
        ));
    }


    public function afficherthemeAction()
    {

        $theme = $this->getDoctrine()->getRepository(theme::class)->findAll();
        return $this->render('@evenement/theme/ajoutertheme.html.twig', array('theme'=>$theme));

    }


    public function modifierthemeAction(Request $request,$id)
    {
        $em =$this->getDoctrine()->getManager();
        $theme = $em->getRepository(theme::class)->find($id);
        if ($request->isMethod('POST')) {
            $theme->setNom($request->get('nom'));
            $em->flush();

            return $this->redirectToRoute("evenement_theme_ajouter");

        }

            return $this->render('@evenement/theme/modifiertheme.html.twig', array(
                'theme' => $theme
            ));
        }




    public function supprimerthemeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $theme_del=$em->getRepository(theme::class)->find($id);
       {
            $em->remove($theme_del);
            $em->flush();
            return $this->redirectToRoute("evenement_theme_ajouter");

        }


    }

}
