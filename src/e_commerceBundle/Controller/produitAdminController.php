<?php

namespace e_commerceBundle\Controller;

use e_commerceBundle\Entity\Produit;
use e_commerceBundle\Form\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class produitAdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('e_commerceBundle:Produit')->findAll();

        return $this->render('@e_commerce/index.html.twig', array(
            'produits' => $produits,));
    }
    public function newAction(Request $request)
    {
        $produit = new Produit();

        $produit->setPhoto($request->get("imageUpload"));

        $em = $this->getDoctrine()->getManager();

        if($request->isMethod('POST')){
            $produit->setNom($request->get("nom"));
            $produit->setStockprosuit($request->get("stock"));
            $produit->setPrix($request->get("prix"));
            $produit->setDiscription($request->get("description"));
            $produit->setTva($request->get("tva"));

        if ($request->files->get('imageUpload')!=NULL) {
            $file=$request->files->get("imageUpload");
            $nomfichier=$this->generateUniqueFileName().'.'.$file->guessExtension();
            $file->move(
                "assets/img/produits/",
                $nomfichier
            );
        }



            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('produitIndex');
        }

        return $this->render('@e_commerce/new.html.twig');
    }



    public function deleteAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository("e_commerceBundle:Produit")->find($id);
        $em->remove($produit);
        $em->flush();


        return $this->redirectToRoute('produitIndex');
    }
    public function editAction(Request $request,$id)
    {

        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository("e_commerceBundle:Produit")->find($id);
        $Form = $this->createForm(ProduitsType::class,$produit);
        $Form->handleRequest($request);
        if ($Form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute('produitIndex');
        }
        return $this->render('@e_commerce/edit.html.twig',array('form'=>$Form->createView()));

    }

private function generateUniqueFileName(){
        return md5(uniqid());
}

}
