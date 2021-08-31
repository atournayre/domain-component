<?php

namespace Atournayre\Component\Domain\LastName;

use Atournayre\Component\Domain\CustomType;
use Atournayre\Component\Domain\Exception\ExceptionInterface;
use Atournayre\Component\Domain\LastName\Exception\LastNameIsEmptyException;
use Atournayre\Component\Domain\LastName\Exception\LastNameShouldBeAStringException;
use Atournayre\Component\Domain\ValidationInterface;

class LastName extends CustomType implements ValidationInterface
{
    private ?string $lastName;

    public function __construct(?string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @throws ExceptionInterface
     */
    public function validate(): void
    {
        if (empty($this->lastName)) {
            throw new LastNameIsEmptyException([$this->lastName]);
        }

        $lastNameClean = str_replace(str_split( '1234567890&~!"#$%&*+./:;<=>?@[\]^_`{|}~'), '', $this->lastName);

        if ($lastNameClean !== $this->lastName) {
            throw new LastNameShouldBeAStringException([$this->lastName]);
        }
    }

    public function __toString(): string
    {
        return $this->lastName;
    }
}
