<?php

namespace AppBundle\Entity\User;

use FOS\OAuthServerBundle\Entity\AuthCode as BaseAuthCode;

/**
 * AuthCode
 */
class AuthCode extends BaseAuthCode
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var User
     */
    protected $user;
}