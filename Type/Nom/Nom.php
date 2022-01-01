<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\Nom;

use Atournayre\Component\Domain\Constraint as Assert;
use Atournayre\Component\Domain\Type\TypePersonnalise;
use Atournayre\Component\Domain\Type\ValidationInterface;

class Nom extends TypePersonnalise implements ValidationInterface
{
    /**
     * @var string|null
     */
    protected ?string $nom;

    /**
     * @param ?string $nom
     */
    public function __construct(?string $nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->nom;
    }

    /**
     * @return bool
     */
    public function estValide(): bool
    {
        return $this->verifierLaValidite($this->nom, [
            new Assert\Nom\Nom(),
        ]);
    }
}
