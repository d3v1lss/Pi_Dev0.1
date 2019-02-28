<?php

namespace e_commerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Twilio\Rest\Client;

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
    public function supprimerCommandeAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $commande=$em->getRepository("e_commerceBundle:commande")->find($id);
        $em->remove($commande);
        $em->flush();


        return $this->redirectToRoute('AfficherCommande');
    }
    public function confirmationAction($id){

        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository('e_commerceBundle:commande')->find($id);
        $account_sid = 'ACed820621f7c9b919ec960ad9118fcd5c';
        $auth_token = '2627619814422b8411d32a357b82ffe7';
        $twilio_phone_number = "+12016279424";

       $client = new Client($account_sid, $auth_token);

       /* $client->messages->create(
            '+21650927486',
            array(
                "from" => $twilio_phone_number,
                "body" => "Votre Commande a été comfirmer !"
            )
        );*/

        $commandes->setValider(1);
        /*var_dump($commandes);
        die();*/
        $em->persist($commandes);
         $em->flush();
        return $this->redirectToRoute('AfficherCommande');
    }

}
