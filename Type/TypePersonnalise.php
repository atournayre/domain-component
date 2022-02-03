<?php
declare(strict_types=1);

namespace Aroban\Component\Domain\Type;

use Aroban\Component\Domain\Constraint as Assert;
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
        return !$this->nEstPasValide($this->contraintesDeValidation());
    }

    /**
     * @param array|Constraint[] $contraintes
     *
     * @return bool
     */
    private function nEstPasValide(array $contraintes = null): bool
    {
        if (count($contraintes) === 0) {
            return false;
        }

        return Assert\ConstraintValidator::hasViolations($this->donneePersonnalisee, $contraintes);
    }

    /**
     * @return array
     */
    protected function contraintesDeValidation(): array
    {
        return [];
    }
}