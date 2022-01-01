<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\NomDeFamille;

use Atournayre\Component\Domain\Constraint as Assert;
use Atournayre\Component\Domain\Type\TypePersonnalise;
use Atournayre\Component\Domain\Type\ValidationInterface;

class NomDeFamille extends TypePersonnalise implements ValidationInterface
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
