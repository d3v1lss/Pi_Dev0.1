<?php

namespace clubBundle\Controller;

use clubBundle\Entity\club;
use clubBundle\Entity\workshop;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class pdfController extends Controller
{




    public function indexAction()
    {
        $snappy = $this->get('knp_snappy.pdf');

        $workshop = $this->getDoctrine()->getRepository(workshop::class)->findALL();

        $html = $this->renderView('pdf.html.twig',array("workshop" => $workshop));


        $filename = 'LISTE WWORKSHOP';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }






}
