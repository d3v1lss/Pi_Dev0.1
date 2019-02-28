<?php

namespace evenementBundle\Controller;

use evenementBundle\Entity\evenement;
use evenementBundle\Entity\theme;
use AppBundle\Entity\user;
use evenementBundle\Form\evenementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class evenementController extends Controller
{


    public function ajouterevenementAction(Request $request)
    {    //   $em=$this->getDoctrine()->getManager();
        if($request->isMethod('POST')) {
            $evenement = new evenement();
         //   $user=$em->getRepository(user)->find($id);
            $user = $this->getUser();
            $evenement->setUser($user);

           // $evenement->setUser($user);
            $evenement->setNom($request->get('nom'));
            $evenement->setNombreplaces($request->get('nombreplaces'));
            $evenement->setDatedebut(new \DateTime( $request->get('datedebut')));
            $evenement->setDatefin(new \DateTime( $request->get('datefin')));
            $evenement->setDiscription($request->get('discription'));
            $evenement->setTheme($this->getDoctrine()->getRepository(theme::class)->find($request->get('theme')));
            $em=$this->getDoctrine()->getManager();

            $file = $request->files->get('imageUpload');
            $nomfichier = md5(uniqid()) .'.'. $file->guessExtension();
            $file->move($this->getParameter('img_directory'), $nomfichier);
            $evenement->setPhoto($nomfichier);

            /*$evenement->setPhoto($request->get('photo'));*/
            dump($evenement);

            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute("evenement_evenement_affuser");

            }
        $theme = $this->getDoctrine()->getRepository(theme::class)->findAll();

       // $evenement = $this->getDoctrine()->getRepository(evenement::class)->findAll();


       return $this->render('@evenement/evenement/ajouterevenement.html.twig',array(
            'themes'=>$theme
        ));

    }

    public function affeventAction()
    {

       /* $evenement = $em->getRepository('bonPenseigneBundle:Evenement')->find($id);

        return $this->render("@bonPenseigne/Default/aff_event.html.twig", array('events' => $evenement));*/


        $evenement = $this->getDoctrine()->getRepository(evenement::class)->findbyid($this->getUser()->getId());
        return $this->render('@evenement/evenement/affevent.hml.twig', array('evenement'=>$evenement));
    }


    public function afficherevenementAction()
    {
        $evenement = $this->getDoctrine()->getRepository(evenement::class)->findAll();
        return $this->render('@evenement/evenement/afficherevenement.html.twig', array('evenement'=>$evenement));

    }


    public function supprimerevenementAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $evenement_del=$em->getRepository(evenement::class)->find($id);
        {
            $em->remove($evenement_del);
            $em->flush();
            return $this->redirectToRoute("evenement_evenement_affuser");

        }
    }


    public function modifierevenementAction(Request $request,$id)
    {
        $em =$this->getDoctrine()->getManager();
        $evenement = $em->getRepository(evenement::class)->find($id);
        if ($request->isMethod('POST')) {
            $evenement->setNom($request->get('nom'));
            $evenement->setNombreplaces($request->get('nombreplaces'));
        //    $evenement->setDatedebut(new \DateTime( $request->get('datedebut')));
         //   $evenement->setDatefin(new \DateTime( $request->get('datefin')));
            $evenement->setDiscription($request->get('discription'));
         //   $evenement->setTheme($request->get('theme'));
            $em->flush();

            return $this->redirectToRoute("evenement_evenement_affuser");

        }

        return $this->render('@evenement/evenement/modifierevenement.html.twig', array(
            'evenement' => $evenement
        ));
    }

    public  function RechercheAction(Request $request)
    {
        $evenement="";
        $evenement=$this->getDoctrine()->getRepository(Evenement::class)->findtheme($request->get('theme'));

        return $this->render('@Evenement/Evenement/recherche.html.twig', array( 'evenement' => $evenement));
    }





}
