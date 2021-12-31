<?php

namespace Atournayre\Component\Domain\Tests\Type;

use Atournayre\Component\Domain\Exception\Exception;
use Atournayre\Component\Domain\Type\EmailAddress\EmailAddress;
use Atournayre\Component\Domain\Type\EmailAddress\Exception\EmailAddressIsEmptyException;
use Atournayre\Component\Domain\Type\EmailAddress\Exception\EmailAddressIsNotValidException;
use Atournayre\Component\Domain\Type\EmailAddress\Exception\EmailAddressShouldContainsArobaseException;
use Atournayre\Component\Domain\Exception\ExceptionInterface;
use PHPUnit\Framework\TestCase;
use stdClass;

class EmailAddressTest extends TestCase
{
    /**
     * @return array
     */
    private function getValidEmails(): array
    {
        return [
            'fabien@symfony.com',
            'example@example.co.uk',
            'fabien_potencier@example.fr',
        ];
    }

    /**
     * @return array
     */
    private function getInvalidEmails(): array
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
            try {
                new EmailAddress($inValidEmail);
            } catch (Exception $e) {
                $this->assertNotNull($e->getMessageKey());
            }
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

    public function testEmailIsValidatedInFactoryAndIsString()
    {
        $email = 'email@example.com';
        $emailAddress = self::fakeFactory($email);

        $this->assertEquals($email, $emailAddress->email);
    }

    public function testEmailAddressNullThrowException()
    {
        try {
            new EmailAddress(null);
        } catch (EmailAddressIsEmptyException $e) {
            $this->assertEquals(
                'Email address "" is empty.',
                vsprintf($e->getMessageKey(), $e->getMessageData())
            );
        }
    }

    public function testEmailAddressWithoutArobaseThrowException()
    {
        try {
            new EmailAddress('emailexample.com');
        } catch (EmailAddressShouldContainsArobaseException $e) {
            $this->assertEquals(
                'Email address should contains @.',
                vsprintf($e->getMessageKey(), [])
            );
        }
    }

    public function testEmailAddressInvalidThrowException()
    {
        try {
            new EmailAddress('email@example');
        } catch (EmailAddressIsNotValidException $e) {
            $this->assertEquals(
                'Email address "email@example" is not valid.',
                vsprintf($e->getMessageKey(), $e->getMessageData())
            );
        }
    }

    /**
     * @param string $emailAddress
     * @return stdClass
     * @throws ExceptionInterface
     */
    private static function fakeFactory(string $emailAddress): stdClass
    {
        $stdObject = new stdClass();
        $stdObject->email = new EmailAddress($emailAddress);

        return $stdObject;
    }
}