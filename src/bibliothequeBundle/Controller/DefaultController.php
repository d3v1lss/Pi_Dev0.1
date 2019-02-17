<?php

namespace bibliothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('bibliothequeBundle:Default:index.html.twig');
    }
}
