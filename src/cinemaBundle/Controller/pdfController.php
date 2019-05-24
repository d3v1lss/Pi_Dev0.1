<?php

namespace cinemaBundle\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use cinemaBundle\Entity\film;
use cinemaBundle\Form\avisType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class pdfController extends Controller
{

    public function indexAction()
    {
        $snappy = $this->get('knp_snappy.pdf');

        $film=$this->getDoctrine()->getRepository(film::class)->findAll();
             $html =$this-> renderView('read.html.twig', array(
            "film" => $film
        ));

        $filename = 'LISTEFILM';

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