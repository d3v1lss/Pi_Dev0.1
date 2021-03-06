<?php

namespace e_commerceBundle\Controller;

use e_commerceBundle\Entity\commande;
use e_commerceBundle\Entity\produit;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Twilio\Rest\Client;
//require __DIR__ . '..\..\..\vendor\twilio\sdk\Twilio\autoload.php';



class PanierController extends Controller
{
    public function indexAction()
    {
        return $this->render('e_commerceBundle:Default:index.html.twig');
    }
    public function menuAction(Request $request)
    {
        $session= $request->getSession();

        if (!$session->has('panier')) {  $session->set('panier', array());  }
        $panier = $session->get('panier');

        $produits=$this->getDoctrine()->getRepository('e_commerceBundle:produit')->findArray(array_keys($panier));


        return $this->render('@e_commerce/menu.html.twig',array('produits'=>$produits ,'panier'=>$panier));
    }
    public function afficherPanierAction(Request $request)
    {
        $session = $request->getSession();
       //$session->remove('panier');
       //die();
        if (!$session->has('panier')) {
            $session->set('panier', array());
        }
        $panier = $session->get('panier');
        $produits = $this->getDoctrine()->getRepository('e_commerceBundle:produit')->findArray(array_keys($panier));

        return $this->render('@e_commerce/panier.html.twig', array('produits' => $produits, 'panier' => $panier));
    }

    public function ajouterAuPanierAction($id, Request $request)
    {
        $session= $request->getSession();

        if (!$session->has('panier')) {
            $session->set('panier', array());
            $session->getFlashBag()->add('success', " Article ajouté avec succès");
        }
        $panier = $session->get('panier');


        if (array_key_exists($id, $panier)) {

            if ($request->query->get('qte') != null){
                $panier[$id] = $request->query->get('qte');
                $session->getFlashBag()->add('success', " Quantité modifié avec succès");
            }
        }else{
            if($request->query->get('qte') != null){
                $panier[$id] = $request->query->get('qte');


            }  else{
                $panier[$id]=1;
                $session->getFlashBag()->add('success', " Article ajouté avec succès");
            }
        }

        $session->set('panier',$panier);

        return $this->redirectToRoute('afficherPanier');
    }

    public function supprimerAction($id)
    {
        $session= new Session();

        $panier = $session->get('panier');

        if (array_key_exists($id, $panier)) {

            unset($panier[$id]);
            $session->set('panier',$panier);
            $session->getFlashBag()->add('success', " Article supprimé avec succès ");
        }

        return $this->redirectToRoute('afficherPanier');
    }

    public function validationAction(Request $request)
    {   $generator = random_bytes(10);
        $em = $this->getDoctrine()->getManager();
       // $session = $request->getSession();
        $session = $this->get('request_stack')->getCurrentRequest()->getSession();
        $panier = $session->get('panier');
        $produits = $em->getRepository('e_commerceBundle:produit')->findArray(array_keys($session->get('panier')));
        $liste = array();
        $totalHT = 0;
        $totalTVA = 0;
        foreach($produits as $produit)
        {
            $prixHT = ($produit->getPrix() * $panier[$produit->getId()]);
            $prixTTC = ($produit->getPrix() * $panier[$produit->getId()] / $produit->getTva()->getMultiplicate());
            $totalHT += $prixHT;
            if (!isset($liste['tva']['%'.$produit->getTva()->getValeur()]))
                $liste['tva']['%'.$produit->getTva()->getValeur()] = round($prixTTC - $prixHT,2);
            else
                $liste['tva']['%'.$produit->getTva()->getValeur()] += round($prixTTC - $prixHT,2);
            $totalTVA += round($prixTTC - $prixHT,2);
            $liste['produit'][$produit->getId()] = array(
                'reference' => $produit->getNom(),
                'quantite' => $panier[$produit->getId()],
                'prixHT' => round($produit->getPrix(),2),
                'prixTTC' => round($produit->getPrix() / $produit->getTva()->getMultiplicate(),2));
        }
        $liste['prixHT'] = round($totalHT,2);
        $liste['prixTTC'] = round($totalHT + $totalTVA,2);
       // $liste['token'] = bin2hex($generator);
      $token = bin2hex($generator);
       //if($session->has('commande')){
            $commande = new commande();
        //}
       // else $commande = $em->getRepository('e_commerceBundle:commande')->find($session->get('commande'));
//session_destroy();
        $commande->setUser($this->container->get('security.token_storage')->getToken()->getUser());
        $commande->setValider(0);
        $commande->setReference($token);
        $commande->setCommande($liste);
//session_destroy();
        if (!$session->has('commande'))
        {
            $em->persist($commande);
            $session->set('commande',$commande);
        }
        $em->flush();

        return $this->render('@e_commerce/validation.html.twig', array('cmd' => $commande));
    }
  public function factureAction(Request $request){

       $snappy = $this->get('knp_snappy.pdf');
      $session = $request->getSession();
      $em = $this->getDoctrine()->getManager();
      $commande = $em ->getRepository('e_commerceBundle:commande')->find($session->get('commande'));
        $html = $this->renderView('@e_commerce/pdf.html.twig', array(
            'cmd'=>$commande));

        $filename ='facture';

        return new Response($snappy->getOutputFromHtml($html),200,array(
            'Content-Type' => 'application/pdf','Content-Disposition' =>'inline; filename="'.$filename.'.pdf"'
        ));
  }

}
