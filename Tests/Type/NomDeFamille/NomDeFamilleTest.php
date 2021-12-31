<?php

namespace Atournayre\Component\Domain\Tests\Type;

use Atournayre\Component\Domain\Type\NomDeFamille\NomDeFamille;
use PHPUnit\Framework\TestCase;

class NomDeFamilleTest extends TestCase
{
    public function testNomDeFamilleValide()
    {
        $nomDeFamille = new NomDeFamille('René, (De) La Motte-Piquet');
        $this->assertTrue($nomDeFamille->estValide());
    }
}