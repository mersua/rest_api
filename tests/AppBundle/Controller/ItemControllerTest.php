<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ItemControllerTest extends WebTestCase
{
    public function testGetItemsHttpOk()
    {
        $client = static::createClient();

        $client->request('GET', '/store/items');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testGetItemsContent()
    {
        $client = static::createClient();

        $client->request('GET', '/store/items');

        $this->assertContains(
            'id',
            $client->getResponse()->getContent()
        );

        $this->assertContains(
            'name',
            $client->getResponse()->getContent()
        );

        $this->assertContains(
            'price',
            $client->getResponse()->getContent()
        );
    }

    public function testAddItemValid()
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/store/item',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"name":"Product_1","price":100.55}'
        );

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());
    }

    public function testAddItemInValid()
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/store/item',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"name":"_","price":""}'
        );

        $this->assertEquals(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
    }
}
