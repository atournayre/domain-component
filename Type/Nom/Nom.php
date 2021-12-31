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
    protected ?string $name;

    /**
     * @param ?string $name
     */
    public function __construct(?string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function estValide(): bool
    {
        return $this->verifierLaValidite($this->name, [
            new Assert\Nom\Nom(),
        ]);
    }
}
