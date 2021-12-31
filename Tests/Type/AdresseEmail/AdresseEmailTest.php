<?php

namespace Atournayre\Component\Domain\Tests\Type;

use Atournayre\Component\Domain\Type\AdresseEmail\AdresseEmail;
use Atournayre\Component\Domain\Exception\ExceptionInterface;
use PHPUnit\Framework\TestCase;
use stdClass;

class AdresseEmailTest extends TestCase
{
    /**
     * @return array
     */
    private function getEmailsValides(): array
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
    private function getEmailsInvalides(): array
    {
        return [
            'example',
            'example@',
            'example@localhost',
            'foo@example.com bar',
        ];
    }

    public function testEmailsValides()
    {
        foreach ($this->getEmailsValides() as $emailValide) {
            $adresseEmail = new AdresseEmail($emailValide);

            $this->assertTrue($adresseEmail->estValide());
        }
    }

    public function testEmailsInvalides()
    {
        foreach ($this->getEmailsInvalides() as $emailInvalide) {
            $adresseEmail = new AdresseEmail($emailInvalide);

            $this->assertFalse($adresseEmail->estValide());
        }
    }

    public function testToStringAsEmail()
    {
        $email = 'email@example.com';
        $adresseEmail = new AdresseEmail($email);
        $this->assertEquals($email, $adresseEmail);
    }

    public function testGetDomain()
    {
        $adresseEmail = new AdresseEmail('email@example.com');
        $this->assertEquals('example.com', $adresseEmail->domaine());
    }

    public function testEmailIsValidatedInFactoryAndIsString()
    {
        $email = 'email@example.com';
        $adresseEmail = self::fakeFactory($email);

        $this->assertEquals($email, $adresseEmail->email);
    }

    /**
     * @param string $adresseEmail
     * @return stdClass
     * @throws ExceptionInterface
     */
    private static function fakeFactory(string $adresseEmail): stdClass
    {
        $stdObject = new stdClass();
        $stdObject->email = new AdresseEmail($adresseEmail);

        return $stdObject;
    }
}