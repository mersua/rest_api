<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UserControllerTest extends WebTestCase
{
    public function testGetUsersHttpOk()
    {
        $client = static::createClient();

        $client->request('GET', '/store/users');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }

    public function testGetUsersContent()
    {
        $client = static::createClient();

        $client->request('GET', '/store/users');

        $this->assertContains(
            'id',
            $client->getResponse()->getContent()
        );

        $this->assertContains(
            'name',
            $client->getResponse()->getContent()
        );

        $this->assertContains(
            'created',
            $client->getResponse()->getContent()
        );
    }

    public function testAddUserValid()
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/store/user',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"name":"TestUser"}'
        );

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());
    }

    public function testAddUserInValid()
    {
        $client = static::createClient();

        $client->request(
            'POST',
            '/store/user',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"name":"_"}'
        );

        $this->assertEquals(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
    }
}
