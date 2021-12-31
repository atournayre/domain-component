<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\LastName;

use Atournayre\Component\Domain\Constraint as Assert;
use Atournayre\Component\Domain\Type\CustomType;
use Atournayre\Component\Domain\Type\ValidationInterface;

class Name extends CustomType implements ValidationInterface
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
        return parent::verifierLaValidite($this->name, [
            new Assert\Name\Name(),
        ]);
    }
}
