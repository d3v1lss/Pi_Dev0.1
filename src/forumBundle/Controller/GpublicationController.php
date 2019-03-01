<?php

namespace forumBundle\Controller;

use forumBundle\Entity\publication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class GpublicationController extends Controller
{
    public function AjoutpublicationAction(Request $request)
    {

        if ($request->isMethod('POST')) {
            $pub = new publication();
            $pub->setTitre($request->get('titre'));
            $pub->setContenu(($request->get('contenu')));
            $em = $this->getDoctrine()->getManager();
            $em->persist($pub);
            $em->flush();
        }
        $pub = $this->getDoctrine()->getRepository(publication::class)->findAll();
        return $this->render('@forum/Gforum/ajouterpublication.html.twig', array(
            'publication' => $pub
        ));
    }

    public function afficheAction()
    {

        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $username = $this->getUser()->getUsername();

        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $userID = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $pub = $em->getRepository("forumBundle:publication")->findBy(array('userid' => $userID));
        $ar = array();
        $count = 0;
        foreach ($pub as $des) {
            $Description = $em->getRepository("forumBundle:publication")->findBy(array('idpub' => $des->getTitre()));
            $ar[$count] = $Description;
            $count++;
        }
        return $this->render('@forum/Gforum/affichpublication.html.twig',array('pub'=>$pub,'ar'=>$ar));

    }
}
