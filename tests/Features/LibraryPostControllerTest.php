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

    public function testvaluefound()
    {
        $client = static::createClient();

        $value = strval(rand(1,1000000));

        $this->sendRequest($client, $value);

        $this->sendRequest($client, $value);

        $this->assertEquals(Response::HTTP_FOUND, $client->getResponse()->getStatusCode());
    }

    private function sendRequest(KernelBrowser $client, string $value = null)
    {
        $client->request(
            'POST',
            '/api/library',
            ["value"          =>  $value??strval(rand(1,1000000))]
        );
    }


    

}