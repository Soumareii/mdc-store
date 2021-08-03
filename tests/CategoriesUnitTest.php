<?php

namespace App\Tests;

use App\Entity\Categories;
use PHPUnit\Framework\TestCase;

class CategoriesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Categories();

        $user->setName('Ibou')
             ->setSlug('slug');

        
        $this->assertTrue($user->getName() === 'Ibou');
        $this->assertTrue($user->getSlug() === 'slug');
    }

    public function testIsFalse()
    {
        $user = new Categories();

        $user->setName('Ibou')
             ->setSlug('slug');

        
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
