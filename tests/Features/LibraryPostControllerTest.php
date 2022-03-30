<?php

namespace App\Tests\Features;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class LibraryPostControllerTest extends WebTestCase
{
    public function testSuccess()
    {
        $client = static::createClient();

        $this->sendRequest($client);

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());
    }

    private function sendRequest(KernelBrowser $client)
    {
        $client->request(
            'POST',
            '/api/library',
            ["value"          =>  strval(rand(1,1000000))]
        );
    }
}