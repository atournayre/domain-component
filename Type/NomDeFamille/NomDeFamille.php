<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\NomDeFamille;

use Atournayre\Component\Domain\Constraint as Assert;
use Atournayre\Component\Domain\Type\TypePersonnalise;

class NomDeFamille extends TypePersonnalise
{
    /**
     * @return array
     */
    protected function contraintesDeValidation(): array
    {
        return [
            new Assert\NomDeFamille\NomDeFamille(),
        ];
    }
}
