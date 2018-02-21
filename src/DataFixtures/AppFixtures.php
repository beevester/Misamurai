<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setUsername('User'.$i);
            $user->setEmail($user->getUsername.'@app.com');
            $user->setRole('ROLE_ADMIN');
            $user->setPassword('password');
            $user->getAvatar($i);
            $user->setUpdated_at(date(DATE_RFC2822));
            $user->setCreated_at(date(DATE_RFC2822));
            $manager->persist($user);
        }

        $manager->flush();
    }
}