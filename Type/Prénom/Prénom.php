<?php
declare(strict_types=1);

namespace Aroban\Component\Domain\Type\Prénom;

use Aroban\Component\Domain\Type\TypePersonnalise;
use Aroban\Component\Domain\Constraint\Prénom\Prénom as ContraintesDuPrénom;

class Prénom extends TypePersonnalise
{
    protected function contraintesDeValidation(): array
    {
        return [
            new ContraintesDuPrénom(),
        ];
    }

}
