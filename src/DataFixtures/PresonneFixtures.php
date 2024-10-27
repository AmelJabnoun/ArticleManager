<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Personne;

class PresonneFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('FR-fr');
    for ($i = 1; $i <= 100; $i++) {
     $Personne = new Personne();
     $Personne->setFirstName($faker->firstName);
     $Personne->setName($faker->name);
     $Personne->setAge($faker->numberBetween(10, 90));
    $Personne->setJob($faker->word);
    $manager->persist($Personne);
    }

        $manager->flush();
    }
}
