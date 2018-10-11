<?php

namespace AppBundle\Entity\User;

use FOS\OAuthServerBundle\Entity\Client as BaseClient;

/**
 * Client
 */
class Client extends BaseClient
{
    /**
     * @var int
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}

