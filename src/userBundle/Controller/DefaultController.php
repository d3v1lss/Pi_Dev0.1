<?php

namespace userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        // lahne ta3mel el redirection 7asseb les roles ba3ed el login
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin_homepage');
           }
           else if
            ($this->get('security.authorization_checker')->isGranted('ROLE_PRESIDENT')) {
                return $this->redirectToRoute('president_homepage');
            }






        return $this->render('@user/Default/index.html.twig');
    }


    public function presidentAction()
    {


        return $this->render('@user/Default/president.html.twig');
    }



    public function adminAction()
    {
        return $this->render('@user/Default/admin.html.twig');
    }
}
