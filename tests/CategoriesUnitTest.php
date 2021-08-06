<?php

namespace App\Tests;

use App\Entity\Categories;
use PHPUnit\Framework\TestCase;

class CategoriesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Categories();

        $user->setName('Lubrifiants moteur')
             ->setSlug('lubrifiants-moteur');
        
        $this->assertTrue($user->getName() === 'Lubrifiants moteur');
        $this->assertTrue($user->getSlug() === 'lubrifiants-moteur');
    }

    public function testIsFalse()
    {
        $user = new Categories();

        $user->setName('Lubrifiants moteur')
             ->setSlug('lubrifiants-moteur');
        
        $this->assertFalse($user->getName() === 'Iba');
        $this->assertFalse($user->getSlug() === 'slog');
    }

    public function testIsEmpty()
    {
        $user = new Categories();

        $this->assertEmpty($user->getName());
        $this->assertEmpty($user->getSlug());
    }
}
