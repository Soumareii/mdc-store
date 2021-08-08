<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $em)
    {
        // Utilisation de Faker
        $faker = Factory::create('fr_FR');

        // Création d'un utilisateur
        $user = new Users();

        $user->setName('Modou Diouf')
             ->setEmail('modou@mdc-store.com');

        $password = $this->hasher->hashPassword($user, 'modou.diouf');
        $user->setPassword($password);

        $em->persist($user);
        $em->flush();
    }
}
