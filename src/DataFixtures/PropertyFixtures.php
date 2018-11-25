<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Property;
use Faker\Factory;

class PropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        
        for($i=0; $i < 100; $i++){
            
            $property = new Property();
            $property
                    ->setTitre($faker->words(3, true))
                    ->setDescription($faker->sentence(3, true))
                    ->setSurface($faker->numberBetween(20,350))
                    ->setRooms($faker->numberBetween(1,12))
                    ->setBedrooms($faker->numberBetween(1,6))
                    ->setFloor($faker->numberBetween(0,16))
                    ->setPrice($faker->numberBetween(10000,220000))
                    ->setHeat($faker->numberBetween(1,3))
                    ->setCity($faker->city)
                    ->setAdress($faker->address)
                    ->setPostalCode($faker->postcode)
                    ->setSold(false)

                    ;
            $manager->persist($property);
        }

        $manager->flush();
    }
}
