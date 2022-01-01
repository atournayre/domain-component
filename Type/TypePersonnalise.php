<?php

namespace Atournayre\Component\Domain\Type;

use Atournayre\Component\Domain\Constraint as Assert;
use Symfony\Component\Validator\Constraint;

class TypePersonnalise
{
    /**
     * @var string|null
     */
    protected ?string $donneePersonnalisee;

    /**
     * @param ?string $donneePersonnalisee
     */
    public function __construct(?string $donneePersonnalisee)
    {
        $this->donneePersonnalisee = $donneePersonnalisee;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->donneePersonnalisee;
    }

    /**
     * @return bool
     */
    public function estValide(): bool
    {
        return $this->verifierLaValidite($this->donneePersonnalisee, $this->contraintesDeValidation());
    }

    /**
     * @return array
     */
    protected function contraintesDeValidation(): array
    {
        return [];
    }

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