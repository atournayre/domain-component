<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\LastName;

use Atournayre\Component\Domain\Constraint as Assert;
use Atournayre\Component\Domain\Type\CustomType;
use Atournayre\Component\Domain\Type\ValidationInterface;

class LastName extends CustomType implements ValidationInterface
{
    /**
     * @var string|null
     */
    private ?string $lastName;

    /**
     * @param string|null $lastName
     */
    public function __construct(?string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return bool
     */
    public function estValide(): bool
    {
        return parent::verifierLaValidite($this->lastName, [
            new Assert\LastName\LastName()
        ]);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->lastName;
    }
}
