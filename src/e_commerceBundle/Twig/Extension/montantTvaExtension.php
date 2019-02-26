<?php
/**
 * Created by PhpStorm.
 * User: Dorra
 * Date: 20/02/2019
 * Time: 23:00
 */

namespace e_commerceBundle\Twig\Extension;


class TvaExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('tva',array($this,'calculTva')));
    }
    function calculTva($prixHT,$tva){

        return round($prixHT / $tva,2);
    }
    public function getName()
    {
        return 'tva_extension';
    }
}