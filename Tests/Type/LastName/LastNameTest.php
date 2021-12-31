<?php

namespace Atournayre\Component\Domain\Tests\Type;

use Atournayre\Component\Domain\Type\LastName\LastName;
use PHPUnit\Framework\TestCase;

class LastNameTest extends TestCase
{
    public function testLastNameValid()
    {
        $lastName = new LastName('René, (De) La Motte-Piquet');
        $this->assertTrue($lastName->isValid());
    }
}