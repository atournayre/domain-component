<?php

namespace Atournayre\Component\Domain\Tests\Type;

use Atournayre\Component\Domain\Type\LastName\Exception\LastNameIsEmptyException;
use Atournayre\Component\Domain\Type\LastName\Exception\LastNameShouldBeAStringException;
use Atournayre\Component\Domain\Type\LastName\LastName;
use PHPUnit\Framework\TestCase;

class LastNameTest extends TestCase
{
    public function testLastNameIsEmptyThrowException()
    {
        try {
            new LastName('');
        } catch (LastNameIsEmptyException $e) {
            $this->assertEquals(
                'A lastname must not be empty.',
                vsprintf($e->getMessageKey(), $e->getMessageData())
            );
        }
    }

    public function testLastNameContainsOnlyString()
    {
        try {
            new LastName('Aurélien7');
        } catch (LastNameShouldBeAStringException $e) {
            $this->assertEquals(
                'A lastname must contains only alpha characters. You provide "Aurélien7" as lastname.',
                vsprintf($e->getMessageKey(), $e->getMessageData())
            );
        }
    }

    public function testLastNameValid()
    {
        $lastName = new LastName('René, (De) La Motte-Piquet');
        $this->assertTrue($lastName->isValid());
    }
}