<?php

namespace App\Tests;

use App\Entity\Products;
use PHPUnit\Framework\TestCase;

class ProductsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $prod = new Products();

        $prod->setTitle('Huile')
             ->setSlug('huile')
             ->setPrice(200.0)
             ->setDescription('Description')
             ->setCoverImage('image.jpg')
             ->setIsAvailable(true);
        
        $this->assertTrue($prod->getTitle() === 'Huile');
        $this->assertTrue($prod->getSlug() === 'huile');
        $this->assertTrue($prod->getPrice() === 200.0);
        $this->assertTrue($prod->getDescription() === 'Description');
        $this->assertTrue($prod->getCoverImage() === 'image.jpg');
        $this->assertTrue($prod->getIsAvailable() === true);
    }

    public function testIsFalse()
    {
        $prod = new Products();

        $prod->setTitle('Huile')
             ->setSlug('slug')
             ->setPrice(1000)
             ->setDescription('Description')
             ->setCoverImage('image.jpg')
             ->setIsAvailable(true);
        
        $this->assertFalse($prod->getTitle() === 'oil');
        $this->assertFalse($prod->getSlug() === 'sluger');
        $this->assertFalse($prod->getPrice() === 3000);
        $this->assertFalse($prod->getDescription() === 'Desc');
        $this->assertFalse($prod->getCoverImage() === 'image03.jpg');
        $this->assertFalse($prod->getIsAvailable() === false);
    }

    public function testIsEmpty()
    {
        $prod = new Products(); 

        $this->assertEmpty($prod->getTitle());
        $this->assertEmpty($prod->getSlug());
        $this->assertEmpty($prod->getPrice());
        $this->assertEmpty($prod->getDescription());
        $this->assertEmpty($prod->getCoverImage());
        $this->assertEmpty($prod->getIsAvailable());
    }
}
