<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\Nom;

use Atournayre\Component\Domain\Constraint as Assert;
use Atournayre\Component\Domain\Type\TypePersonnalise;

class Nom extends TypePersonnalise
{
    /**
     * @return array
     */
    protected function contraintesDeValidation(): array
    {
        return [
            new Assert\Nom\Nom(),
        ];
    }
}
