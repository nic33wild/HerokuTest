<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;

/*
class UserFixture extends BaseFixture
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_users', function ($i){

            $user = new User();
            $user->setEmail(sprintf('spacebar%d@example.com', $i));
            $user->setName($this->faker->firstname);

            return $user;
        });
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}*/
class UserFixture extends Fixture{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager){
        $faker = Faker\Factory::create();
        for ($i = 0 ; $i < 15 ; $i ++){
            $user = new User();
            $user->setEmail(sprintf('user%d@example.com', $i));
            $user->setSurname(sprintf('user%d',$i));
            $user->setName($faker->firstname);
            $user->setPhone(0606060606);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user, 'engage'
            ));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
