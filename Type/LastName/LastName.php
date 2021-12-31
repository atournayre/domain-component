<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\LastName;

use Atournayre\Component\Domain\Type\CustomType;
use Atournayre\Component\Domain\Exception\ExceptionInterface;
use Atournayre\Component\Domain\Type\LastName\Exception\LastNameIsEmptyException;
use Atournayre\Component\Domain\Type\LastName\Exception\LastNameShouldBeAStringException;
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->lastName;
    }
}
