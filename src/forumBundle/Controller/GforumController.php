<?php

namespace forumBundle\Controller;

use forumBundle\Entity\forum;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GforumController extends Controller
{

    public function AjouterforumAction(Request $request)
    {
        if($request->isMethod('POST')) {
            $forum = new forum();
            $forum->setNom($request->get('nom'));
            $forum->setDiscription($request->get('discription'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($forum);
            $em->flush();
        }
        $forum = $this->getDoctrine()->getRepository(forum::class)->findAll();
        return $this->render('@forum/Gforum/ajouterforum.html.twig',array(
            'forum'=>$forum
        ));
    }
    public  function AffichforumAction(){

        $forum = $this->getDoctrine()->getRepository(forum::class)->findAll();
        return $this->render('@forum/Gforum/ajouterforum.html.twig', array('forum'=>$forum));
        }


        public  function  modifforumAction(Request $request, $id){
            $em =$this->getDoctrine()->getManager();
            $forum = $em->getRepository(forum::class)->find($id);
            if ($request->isMethod('POST')) {
                $forum->setNom($request->get('nom'));
                $forum->setDiscription($request->get('discription'));
                $em->flush();

                return $this->redirectToRoute("forum_ajout");

            }

            return $this->render('@forum/Gforum/modifierforum.html.twig', array(
                'forum' => $forum
            ));
     }

    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $forum_del=$em->getRepository(forum::class)->find($id);
        {
            $em->remove($forum_del);
            $em->flush();
            return $this->redirectToRoute("forum_ajout");

        }
    }

    public  function AffichforumuserAction(){
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $username= $this->getUser()->getUsername() ;
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");

        $forum = $this->getDoctrine()->getRepository(forum::class)->findAll();
        return $this->render('@forum/Gforum/affichformuser.html.twig',array(
            'forum'=>$forum
        ));
    }


    public function searchAction(Request $request) {
        if ($request->isMethod('post')) {
            $forum = $this->getDoctrine()->getRepository(forum::class)->findDomainByName($request->get('query'));
        }
        return $this->render('@News/Domain/index.html.twig',array(
            'forum'=>$forum
        ));
    }
    }




