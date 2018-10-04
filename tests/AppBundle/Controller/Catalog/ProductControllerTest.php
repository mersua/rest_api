<?php

namespace Tests\AppBundle\Controller\Catalog;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ItemControllerTest extends WebTestCase
{
    public function testGetProductsHttpOk()
    {
        $client = static::createClient();

        $client->request('GET', '/store/catalog');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testGetProductsContent()
    {
        $client = static::createClient();

        $client->request('GET', '/store/catalog');

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
            '/store/catalog/charger/add',
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
            '/store/catalog/charger/add',
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
            '/store/catalog/product/4/remove',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{}'
        );

        $this->assertContains(
            'The Product has been removed successfully!',
            $client->getResponse()->getContent()
        );
    }
}
