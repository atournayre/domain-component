<?php

namespace Atournayre\Component\Domain\Tests;

use Atournayre\Component\Domain\EmailAddress\EmailAddress;
use PHPUnit\Framework\TestCase;

class EmailAddressTest extends TestCase
{
    public function getValidEmails()
    {
        return [
            'fabien@symfony.com',
            'example@example.co.uk',
            'fabien_potencier@example.fr',
        ];
    }

    public function getInvalidEmails()
    {
        return [
            'example',
            'example@',
            'example@localhost',
            'foo@example.com bar',
        ];
    }

    public function testValidEmails()
    {
        foreach ($this->getValidEmails() as $validEmail) {
            $emailAddress = new EmailAddress($validEmail);

            $this->assertTrue($emailAddress->isValid());
        }
    }

    public function testInValidEmails()
    {
        foreach ($this->getInValidEmails() as $inValidEmail) {
            $emailAddress = new EmailAddress($inValidEmail);

            $this->assertFalse($emailAddress->isValid());
        }
    }

    public function testToStringAsEmail()
    {
        $email = 'email@example.com';
        $emailAddress = new EmailAddress($email);
        $this->assertEquals($email, $emailAddress);
    }

    public function testGetDomain()
    {
        $emailAddress = new EmailAddress('email@example.com');
        $this->assertEquals('example.com', $emailAddress->domain());
    }
}