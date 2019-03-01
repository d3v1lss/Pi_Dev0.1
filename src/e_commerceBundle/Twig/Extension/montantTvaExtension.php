<?php
/**
 * Created by PhpStorm.
 * User: Dorra
 * Date: 20/02/2019
 * Time: 23:00
 */

namespace e_commerceBundle\Twig\Extension;


class montantTvaExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('montantTva', array($this,'montantTvaFilter')));
    }

    function montantTvaFilter($prixHT,$tva)
    {
        return round((($prixHT / $tva) - $prixHT),2);
    }

    public function getName()
    {
        return 'montant_tva_extension';
    }
}