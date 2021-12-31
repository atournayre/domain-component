<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\NomDeFamille;

use Atournayre\Component\Domain\Constraint as Assert;
use Atournayre\Component\Domain\Type\TypePersonnalise;
use Atournayre\Component\Domain\Type\ValidationInterface;

class NomDeFamille extends TypePersonnalise implements ValidationInterface
{
    /**
     * @var string|null
     */
    private ?string $nomDeFamille;

    /**
     * @param string|null $nomDeFamille
     */
    public function __construct(?string $nomDeFamille)
    {
        $this->nomDeFamille = $nomDeFamille;
    }

    /**
     * @return bool
     */
    public function estValide(): bool
    {
        return parent::verifierLaValidite($this->nomDeFamille, [
            new Assert\NomDeFamille\NomDeFamille()
        ]);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->nomDeFamille;
    }
}
