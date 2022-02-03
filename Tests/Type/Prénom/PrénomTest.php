<?php

namespace Aroban\Component\Domain\Tests\Type\Prénom;

use Aroban\Component\Domain\Type\Prénom\Prénom;
use PHPUnit\Framework\TestCase;

class PrénomTest extends TestCase
{
    public function testLePrenomEstValide(): void
    {
        $prénom = new Prénom('Arnaud');

        $this->assertTrue($prénom->estValide());
    }

    public function testLePrenomNestPasValide(): void
    {
        $prénom = new Prénom('4rnaud');

        $this->assertFalse($prénom->estValide());
    }
}
