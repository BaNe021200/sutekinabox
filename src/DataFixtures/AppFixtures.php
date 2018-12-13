<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for($i=0; $i<10; $i++)
        {
            $produit = new Produit();
            $produit->setProductName($faker->word(1));
            $produit->setPrix($faker->randomFloat(2, 5.99, 10.99));
            //$produit->setProductConformity($faker->boolean(70));
            $produit->setImage('https://picsum.photos/200/300?image='.$i);
            $produit->setProductDisponibility($faker->boolean(70));
            $produit->setQuantity($faker->numberBetween(0,10));
            $manager->persist($produit);
        }

        $manager->flush();
    }

}
