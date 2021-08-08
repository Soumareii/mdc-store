<?php

namespace App\Tests;

use App\Entity\Blogposts;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class BlogpostsBlogpostsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $blog = new Blogposts();
        $datetime = new DateTimeImmutable();

        $blog->setTitle('Titre')
             ->setSlug('slug')
             ->setCreatedAt($datetime)
             ->setContent('Description')
             ->setImage('image.jpg');
        
        $this->assertTrue($blog->getTitle() === 'Titre');
        $this->assertTrue($blog->getSlug() === 'slug');
        $this->assertTrue($blog->getCreatedAt() === $datetime);
        $this->assertTrue($blog->getContent() === 'Description');
        $this->assertTrue($blog->getImage() === 'image.jpg');
    }

    public function testIsFalse()
    {
        $blog = new Blogposts();
        $datetime = new DateTimeImmutable();

        $blog->setTitle('Titre')
             ->setSlug('slug')
             ->setCreatedAt($datetime)
             ->setContent('Description')
             ->setImage('image.jpg');
        
        $this->assertFalse($blog->getTitle() === 'Titre01');
        $this->assertFalse($blog->getSlug() === 'slug01');
        $this->assertFalse($blog->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($blog->getContent() === 'Contenu');
        $this->assertFalse($blog->getImage() === 'image01.jpg');
    }

    public function testIsEmpty()
    {
        $blog = new Blogposts(); 

        $this->assertEmpty($blog->getTitle());
        $this->assertEmpty($blog->getSlug());
        $this->assertEmpty($blog->getCreatedAt());
        $this->assertEmpty($blog->getContent());
        $this->assertEmpty($blog->getImage());
    }
}
