<?php

namespace userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        
        if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('admin_homepage');
        }


        else if($this->get('security.authorization_checker')->isGranted('ROLE_CLIENT'))
        {
            return $this->redirectToRoute('client_homepage');
        }


        return $this->render('@user/Default/index.html.twig');
    }



    public function adminAction()
    {
        return $this->render('@user/Default/admin.html.twig');
    }


    public function clientAction()
    {
        return $this->render('@user/Default/client.html.twig');
    }


    public function findAction($nom)
    {
        $nom = $this->getDoctrine()->getManager()
            ->getRepository('userBundle:user')
            ->find($nom);
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($nom);
        return new JsonResponse($formatted);
    }

}
