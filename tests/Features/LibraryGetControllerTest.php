<?php

namespace App\Tests\Features;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class LibraryGetControllerTest extends WebTestCase
{
    public function testSuccess()
    {
        $client = static::createClient();

        $this->sendRequestCreate($client);

        $this->sendRequestSearch($client, '111111');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testError()
    {
        $client = static::createClient();

        $this->sendRequestCreate($client);

        $this->sendRequestSearch($client, '[[[[[[[');

        $this->assertEquals(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
    }

    private function sendRequestCreate(KernelBrowser $client)
    {
        $client->request(
            'POST',
            '/api/library',
            ["value"          =>  '111111']
        );
    }

    private function sendRequestSearch(KernelBrowser $client, string $value)
    {
        $client->request(
            'GET',
            '/api/library/'.$value
        );
    }
}