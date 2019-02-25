<?php

namespace forumBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GforumControllerTest extends WebTestCase
{
    public function testAjouterforum()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Ajouterforum');
    }

}
