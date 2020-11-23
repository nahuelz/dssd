<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        /* @var $user Usuario */
        $user = new Usuario();
        $user->setUsername('test');
        $user->setPassword('$2a$04$9P82jMqoJPP0TZEHmUo6eeVQQKb5p6HEzrxzmFpl8OgDBxuSqZSQe');
        $user->setEmail('test');
        $user->setIsActive(1);
        $manager->persist($user);

        $manager->flush();
    }
}
