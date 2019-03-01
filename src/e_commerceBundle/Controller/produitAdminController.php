<?php

namespace e_commerceBundle\Controller;

use e_commerceBundle\Entity\Produit;
use e_commerceBundle\Form\ProduitsType;
use Proxies\__CG__\e_commerceBundle\Entity\tva;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class produitAdminController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('e_commerceBundle:produit')->findAll();

        return $this->render('@e_commerce/index.html.twig', array(
            'produits' => $produits,));
    }
    public function newAction(Request $request)
    {
        $p= new Produit();
        $produit = new Produit();
       $form=$this->createFormBuilder($p)->add('tva', EntityType::class,array(
           'class'=>'e_commerceBundle:tva',
           'choice_label'=>'valeur',
           'multiple'=>false,
       ))->getForm();
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if($request->isMethod('POST')){

            $produit->setNom($request->get("nom"));
            $produit->setDisponible($request->get("stock"));
            $produit->setPrix($request->get("prix"));
            $produit->setDescription($request->get("description"));
            $produit->setTva($p->getTva());

        if ($request->files->get('imageUpload')!=NULL) {
            $file=$request->files->get("imageUpload");
            $nomfichier=$this->generateUniqueFileName().'.'.$file->guessExtension();
            $file->move(
                "img",
                $nomfichier
            );
        }
            $produit->setPhoto('img/'.$nomfichier);

            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('produitIndex');
        }

        return $this->render('@e_commerce/new.html.twig',array('form'=>$form->createView()));
    }



    public function deleteAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository("e_commerceBundle:produit")->find($id);
        $em->remove($produit);
        $em->flush();


        return $this->redirectToRoute('produitIndex');
    }
    public function editAction(Request $request,$id)
    {

        $em=$this->getDoctrine()->getManager();
        $produit=$em->getRepository("e_commerceBundle:produit")->find($id);
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
