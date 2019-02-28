<?php

namespace e_commerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class StoreController extends Controller
{
    public function indexAction()
    {
        return $this->render('@e_commerce/store.html.twig');
    }
    //el panier el saghroun
    public function menuAction(Request $request)
    {
        $session= $request->getSession();

        if (!$session->has('panier')) {  $session->set('panier', array());  }
        $panier = $session->get('panier');

        $produits=$this->getDoctrine()->getRepository('e_commerceBundle:produit')->findArray(array_keys($panier));


        return $this->render('@e_commerce/menu.html.twig',array('produits'=>$produits ,'panier'=>$panier));
    }
    //page mta les produits lkol
    public function AfficherProduitsAction(Request $request)
    {
        $session= new Session();
        $em = $this->getDoctrine()->getManager();
        $prods=$em->getRepository('e_commerceBundle:produit')->findBy(array('disponible' => 1));
       // $prods=array();
        if ($session->has('panier')) {
            $panier = $session->get('panier');
        }else{
            $panier=false;
        }
        /*for ($i=0;$i<sizeof($produits)-1;$i+=2){
            $double=array();
            $double[]=$produits[$i];
            $double[]=$produits[$i+1];
            $prods[]=$double;
        }*/

        if ($request->isXmlHttpRequest()) {
            $serializer=new Serializer((array(new ObjectNormalizer())));

            $result=$em->getRepository('e_commerceBundle:produit')->findNom($request->get('nom'));
            $data=$serializer->normalize($result);
            return $this->render('@e_commerce/store.html.twig',array('data'=>$data));
        }
        $produits =  $this->get('knp_paginator')->paginate(
            $prods, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
       );
        return $this->render('@e_commerce/store.html.twig',array('produits'=>$produits,'panier'=>$panier));

    }
    //juste la page d info
    public function produitAction($id)
    {
        $session= new Session();

        $produit=$this->getDoctrine()->getRepository('e_commerceBundle:produit')->find($id);

        if(!$produit) throw $this->createNotFoundException('La page n\'existe pas ');

        if ($session->has('panier')) {
            $panier = $session->get('panier');
        }else{

            $panier=false;
        }

        return $this->render('@e_commerce/produit.html.twig',array('produit'=>$produit,'panier'=>$panier));
    }
}
