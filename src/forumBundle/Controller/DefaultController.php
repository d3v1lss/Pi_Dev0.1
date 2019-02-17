<?php

namespace forumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('forumBundle:Default:index.html.twig');
    }
}
