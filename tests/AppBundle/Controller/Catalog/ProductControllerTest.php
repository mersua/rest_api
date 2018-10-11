<?php

namespace Tests\AppBundle\Controller\Catalog;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ItemControllerTest extends WebTestCase
{
    public function testGetProductsHttpUnAuthorized()
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/product/all');

        $this->assertEquals(Response::HTTP_UNAUTHORIZED, $client->getResponse()->getStatusCode());
    }

    public function testGetProductsContent()
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/product/phone/all');

        $this->assertContains(
            'id',
            $client->getResponse()->getContent()
        );

        $this->assertContains(
            'name',
            $client->getResponse()->getContent()
        );

        $this->assertContains(
            'manufacturer',
            $client->getResponse()->getContent()
        );

        $this->assertContains(
            'price',
            $client->getResponse()->getContent()
        );
    }

    public function testAddProductValid()
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/api/v1/product/charger/add',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"name":"Charger","manufacturer":"LG","price":35,"material":"quartz","voltage":120}'
        );

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());
    }

    public function testAddProductInValid()
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/api/v1/product/charger/add',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"name":"","manufacturer":"LG","price":35,"material":"quartz","voltage":0}'
        );

        $this->assertEquals(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
    }

    public function testRemoveProductValid()
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/api/v1/product/7/delete',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{}'
        );

        $this->assertContains(
            'The product was deleted successfully!',
            $client->getResponse()->getContent()
        );
    }
}
