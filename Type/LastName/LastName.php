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
     *
     * @throws LastNameIsEmptyException
     * @throws LastNameShouldBeAStringException
     */
    public function __construct(?string $lastName)
    {
        $this->validate($lastName);

        $this->lastName = $lastName;
    }

    /**
     * @param $value
     *
     * @return void
     * @throws LastNameIsEmptyException
     * @throws LastNameShouldBeAStringException
     */
    public function validate($value): void
    {
        if (empty($value)) {
            throw new LastNameIsEmptyException([$value]);
        }

        if ($this->lastNameIsDifferentThanLastNameWithoutForbiddenCharacters($value)) {
            throw new LastNameShouldBeAStringException([$value]);
        }
    }

    /**
     * @param mixed|null $value
     *
     * @return bool
     */
    public function isValid($value = null): bool
    {
        return parent::isValid($this->lastName);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return string|null
     */
    private function cleanupWithoutForbiddenCharacters(?string $lastName): ?string
    {
        return str_replace(str_split(self::FORBIDEN_CHARACTERS), '', $lastName);
    }

    /**
     * @param string|null $lastName
     *
     * @return bool
     */
    private function lastNameIsDifferentThanLastNameWithoutForbiddenCharacters(?string $lastName): bool
    {
        return $lastName !== $this->cleanupWithoutForbiddenCharacters($lastName);
    }
}
