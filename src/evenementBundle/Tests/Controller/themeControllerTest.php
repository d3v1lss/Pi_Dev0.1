<?php

namespace evenementBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class themeControllerTest extends WebTestCase
{
    public function testAjoutertheme()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajoutertheme');
    }

    public function testAffichertheme()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/affichertheme');
    }

    public function testModifiertheme()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modifiertheme');
    }

    public function testSupprimertheme()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimertheme');
    }

}
