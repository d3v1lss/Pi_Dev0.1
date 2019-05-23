<?php

namespace cinemaBundle\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use cinemaBundle\Entity\avis;
use cinemaBundle\Form\avisType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class AvisController extends Controller
{

    public function AjoutAction(Request $request)
    {
        $v = new avis();


        $form = $this->createForm(avisType::class, $v);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($v);
            $em->flush();
        }
        return $this->render("@cinema/Default/Avis.html.twig", array('m' => $form->createView()));

    }
    public function indexAction()
    {
        $pieChart = new PieChart();
        $em = $this->getDoctrine()->getManager();
        $classes = $em->getRepository(avis::class)->findByavischoix("Mauvais");
        $type = array();
        $s = 0;
        foreach ($classes as $P) {
            array_push($type, $P);
            $s = $s + 1;
        }
        $em = $this->getDoctrine()->getManager();
        $classes = $em->getRepository(avis::class)->findByavischoix("Bien");
        $type = array();
        $k = 0;
        foreach ($classes as $O) {
            array_push($type, $O);
            $k = $k + 1;
        }
        $em = $this->getDoctrine()->getManager();
        $classes = $em->getRepository(avis::class)->findByavischoix("TrésBien");
        $type = array();
        $m = 0;
        foreach ($classes as $O) {
            array_push($type, $O);
            $m = $m + 1;
        }
        $em = $this->getDoctrine()->getManager();
        $classes = $em->getRepository(avis::class)->findByavischoix("Passable");
        $type = array();
        $f = 0;
        foreach ($classes as $O) {
            array_push($type, $O);
            $f = $f + 1;
        }
        $em = $this->getDoctrine()->getManager();
        $classes = $em->getRepository(avis::class)->findByavischoix("Assez Bien");
        $type = array();
        $r = 0;
        foreach ($classes as $O) {
            array_push($type, $O);
            $r = $r + 1;
        }

        $pieChart->getData()->setArrayToDataTable(
            [['Task', 'Hours per Day'],
                ['Mauvais', $s],
                ['Passable', $f],
                ['Bien', $k],
                ['Assez Bien', $r],
                ['TrésBien', $m]

            ]
        );
        $pieChart->getOptions()->setTitle('Statistique Avis sur notre service');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);


        return $this->render("@cinema/Default/StatAvis.html.twig", array('piechart' => $pieChart));
    }






    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $avis = new avis();
        $avis->setNom($request->get('avis'));

        $em->persist($avis);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($avis);
        return new JsonResponse($formatted);
    }




}