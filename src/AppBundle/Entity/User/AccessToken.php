<?php

namespace AppBundle\Entity\User;

use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;

/**
 * AccessToken
 */
class AccessToken extends BaseAccessToken
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

