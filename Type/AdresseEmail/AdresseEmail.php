<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\AdresseEmail;

use Atournayre\Component\Domain\Constraint as Assert;
use Atournayre\Component\Domain\Type\TypePersonnalise;
use Atournayre\Component\Domain\Type\ValidationInterface;

class AdresseEmail extends TypePersonnalise implements ValidationInterface
{
    /**
     * @var string|null
     */
    private ?string $adresseEmail;

    /**
     * @param string|null $adresseEmail
     */
    public function __construct(?string $adresseEmail)
    {
        $this->adresseEmail = $adresseEmail;
    }

    /**
     * @return bool
     */
    public function estValide(): bool
    {
        return parent::verifierLaValidite($this->adresseEmail, [
            new Assert\AdresseEmail\AdresseEmail(),
        ]);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->adresseEmail;
    }

    /**
     * @return string
     */
    public function domaine(): string
    {
        return substr(
            $this->adresseEmail,
            strpos($this->adresseEmail, '@') + 1,
            strlen($this->adresseEmail)
        );
    }
}