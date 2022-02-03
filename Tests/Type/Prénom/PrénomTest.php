<?php

namespace Atournayre\Component\Domain\Tests\Type\Prénom;

use Atournayre\Component\Domain\Type\Prénom\Prénom;
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
