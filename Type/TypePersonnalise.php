<?php

namespace Atournayre\Component\Domain\Type;

use Atournayre\Component\Domain\Constraint as Assert;
use Symfony\Component\Validator\Constraint;

class TypePersonnalise
{
    /**
     * @param mixed|null         $valeur
     * @param array|Constraint[] $contraintes
     *
     * @return bool
     */
    private function nEstPasValide($valeur = null, array $contraintes = null): bool
    {
        if (count($contraintes) === 0) {
            return false;
        }

        return Assert\ConstraintValidator::hasViolations($valeur, $contraintes);
    }

    /**
     * @param mixed|null         $valeur
     * @param array|Constraint[] $contraintes
     *
     * @return bool
     */
    public function verifierLaValidite($valeur = null, array $contraintes = null): bool
    {
        return !$this->nEstPasValide($valeur, $contraintes);
    }
}