<?php

namespace Clunch\CategoryBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/category');

        $this->assertJsonResponse($response, 200);

        $this->assertContains('Hello World', );
    }
}
