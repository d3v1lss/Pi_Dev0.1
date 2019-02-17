<?php

namespace e_commerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('e_commerceBundle:Default:index.html.twig');
    }
}
