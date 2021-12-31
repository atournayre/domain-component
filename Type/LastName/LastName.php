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
    const FORBIDEN_CHARACTERS = '1234567890&~!"#$%&*+./:;<=>?@[\]^_`{|}~';

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

        if ($this->lastNameIsDifferentThanLastNameWithoutForbiddenCharacters()) {
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

    /**
     * @return string|null
     */
    private function cleanupWithoutForbiddenCharacters(): string
    {
        return str_replace(str_split(self::FORBIDEN_CHARACTERS), '', $this->lastName);
    }

    /**
     * @return bool
     */
    private function lastNameIsDifferentThanLastNameWithoutForbiddenCharacters(): bool
    {
        return $this->lastName !== $this->cleanupWithoutForbiddenCharacters();
    }
}
