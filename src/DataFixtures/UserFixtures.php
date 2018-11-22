<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    public $encode;


    public function __construct(UserPasswordEncoderInterface $encode) {
        $this->encode = $encode;
    }

        public function load(ObjectManager $manager)
    {
      
        $user = new User();
        $user->setUsername('momo')
             ->setPassword($this->encode->encodePassword($user, 'momo'));
        $manager->persist($user);
        $manager->flush();
    }
}
