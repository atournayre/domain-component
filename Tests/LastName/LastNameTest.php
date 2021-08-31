<?php

namespace Atournayre\Component\Domain\LastName;

use Atournayre\Component\Domain\LastName\Exception\LastNameIsEmptyException;
use Atournayre\Component\Domain\LastName\Exception\LastNameShouldBeAStringException;
use PHPUnit\Framework\TestCase;

class LastNameTest extends TestCase
{
    public function testLastNameIsEmptyThrowException()
    {
        try {
            $lastName = new LastName('');
            $lastName->validate();
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
            $lastName = new LastName('Aurélien7');
            $lastName->validate();
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
        //$lastName = new LastName('Robert De La Motte Piquet');
        $this->assertTrue($lastName->isValid());
    }
}