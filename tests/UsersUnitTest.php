<?php

namespace App\Tests;

use App\Entity\Users;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\Extension\Core\DataTransformer\UlidToStringTransformer;
use Symfony\Component\Form\Extension\Core\DataTransformer\UuidToStringTransformer;

class UsersUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Users();

        $user->setName('Ibou')
             ->setEmail('ibou@mdc.com')
             ->setPassword('mypass');
        
        $this->assertTrue($user->getName() === 'Ibou');
        $this->assertTrue($user->getEmail() === 'ibou@mdc.com');
        $this->assertTrue($user->getPassword() === 'mypass');
    }

    public function testIsFalse()
    {
        $user = new Users();

        $user->setName('Ibou')
             ->setEmail('ibou@mdc.com')
             ->setPassword('mypass');
        
        $this->assertFalse($user->getName() === 'Iba');
        $this->assertFalse($user->getEmail() === 'iba@mdc.com');
        $this->assertFalse($user->getPassword() === 'mypassed');
    }

    public function testIsEmpty()
    {
        $user = new Users();

        $this->assertEmpty($user->getName());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
    }
}
