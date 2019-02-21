<?php

namespace evenementBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class evenementControllerTest extends WebTestCase
{
    public function testAjouterevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouterevenement');
    }

    public function testAfficherevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficherevenement');
    }

    public function testSupprimerevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimerevenement');
    }

    public function testModifierevenement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifierevenement');
    }

}
