<?php

namespace App\DataFixtures;

use App\Entity\Blogposts;
use App\Entity\Categories;
use App\Entity\Products;
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

        // Création de 10 Blogposts
        for ($i = 0; $i < 10; $i) {
            $blogposts = new Blogposts();

            $blogposts->setTitle($faker->sentence(4, false))
                      ->setContent($faker->text(400))
                      ->setImage('https://picsum.photos/900/500?random='.mt_rand(1,10000))
                      ->setUsers($user);
            $user->addBlogpost($blogposts);

            $em->persist($blogposts);
        }

        // Création de 10 Produits/catégories
        for ($j = 0; $j < 3; $j++) {
            $categories = new Categories();

            $categories->setName($faker->word());
            
            $em->persist($categories);

            for ($i = 0; $i < 10; $i++) {
                $products = new Products();

                $products->setTitle($faker->word(3, false))
                         ->setPrice(mt_rand(3000, 60000))
                         ->setDescription($faker->text(200))
                         ->setCoverImage('https://picsum.photos/500/450?random='.mt_rand(1,10000))
                         ->setIsAvailable(mt_rand(0, 1))
                         ->setUsers($user)
                         ->setCategories($categories);
                $user->addProduct($products);
                $categories->addProduct($products);

            }
        }

        $em->flush();
    }
}
