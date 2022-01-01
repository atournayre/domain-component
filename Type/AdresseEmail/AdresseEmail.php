<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\AdresseEmail;

use Atournayre\Component\Domain\Constraint as Assert;
use Atournayre\Component\Domain\Type\TypePersonnalise;
use Atournayre\Component\Domain\Type\ValidationInterface;

class AdresseEmail extends TypePersonnalise implements ValidationInterface
{
    /**
     * @return array
     */
    protected function contraintesDeValidation(): array
    {
        return [
            new Assert\AdresseEmail\AdresseEmail(),
        ];
    }

    /**
     * @return string
     */
    public function domaine(): string
    {
        return substr(
            $this->donneePersonnalisee,
            strpos($this->donneePersonnalisee, '@') + 1,
            strlen($this->donneePersonnalisee)
        );
    }
}