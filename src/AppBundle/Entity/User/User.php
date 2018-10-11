<?php

namespace AppBundle\Entity\User;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';

    /**
     * @var int
     */
    protected $id;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isUserRole()
    {
        return in_array(self::ROLE_USER, $this->roles);
    }

    /**
     * @return bool
     */
    public function isAdminRole()
    {
        return in_array(self::ROLE_ADMIN, $this->roles);
    }
}