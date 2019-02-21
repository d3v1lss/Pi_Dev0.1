<?php

namespace evenementBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class reservationControllerTest extends WebTestCase
{
    public function testAjouterreservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouterreservation');
    }

    public function testAfficherreservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficherreservation');
    }

    public function testModifierreservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifierreservation');
    }

    public function testSupprimerreservation()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimerreservation');
    }

}
