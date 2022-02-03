<?php

namespace Atournayre\Component\Domain\Type\Prénom;

use Atournayre\Component\Domain\Type\TypePersonnalise;
use Atournayre\Component\Domain\Constraint\Prénom\Prénom as ContraintesDuPrénom;

class Prénom extends TypePersonnalise
{
    protected function contraintesDeValidation(): array
    {
        return [
            new ContraintesDuPrénom(),
        ];
    }

}
