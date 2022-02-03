<?php
declare(strict_types=1);

namespace Aroban\Component\Domain\Type\Nom;

use Aroban\Component\Domain\Constraint as Assert;
use Aroban\Component\Domain\Type\TypePersonnalise;

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
