<?php

namespace Atournayre\Component\Domain\Tests\Type;

use Atournayre\Component\Domain\Type\Nom\Nom;
use PHPUnit\Framework\TestCase;

class NomTest extends TestCase
{
    public function testNomComposeDeChiffreEstInValide()
    {
        $nomDeFamille = new Nom(1);
        $this->assertFalse($nomDeFamille->estValide());
    }

    public function testNomComposeDeChiffreEnTantQueChaineEstInValide()
    {
        $nomDeFamille = new Nom('1');
        $this->assertFalse($nomDeFamille->estValide());
    }

    public function testNomsComplexes()
    {
        $noms = [
            'Mathias d\'Arras',
            'Martin Luther King jr.',
            'Hector Sausage-Hausen',
        ];

        foreach ($noms as $nom) {
            $nomDeFamille = new Nom($nom);
            $this->assertTrue($nomDeFamille->estValide());
        }
    }
}
