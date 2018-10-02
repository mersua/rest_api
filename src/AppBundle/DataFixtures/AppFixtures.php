<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const COUNT_USERS = 5;

    public function load(ObjectManager $manager) {
        for ($i = 0; $i < self::COUNT_USERS; $i++) {
            $user = new User();
            $user->setName("User #" . $i);

            $manager->persist($user);
        }

        $manager->flush();
    }
}