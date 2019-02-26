<?php

namespace e_commerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Util\SecureRandom;

class CommandeAdminController extends Controller
{

    public function AfficherCommandeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('e_commerceBundle:commande')->findAll();

        return $this->render('@e_commerce/commande.html.twig', array(
            'commandes' => $commandes,
        ));
    }

}
