<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\EmailAddress;

use Atournayre\Component\Domain\Type\CustomType;
use Atournayre\Component\Domain\Type\EmailAddress\Exception\EmailAddressIsNotValidException;
use Atournayre\Component\Domain\Type\EmailAddress\Exception\EmailAddressIsEmptyException;
use Atournayre\Component\Domain\Type\EmailAddress\Exception\EmailAddressShouldContainsArobaseException;
use Atournayre\Component\Domain\Exception\ExceptionInterface;
use Atournayre\Component\Domain\Type\ValidationInterface;

class EmailAddress extends CustomType implements ValidationInterface
{
    /**
     * @var string|null
     */
    private ?string $emailAddress;

    /**
     * @param string|null $emailAddress
     *
     * @throws EmailAddressIsEmptyException
     * @throws EmailAddressIsNotValidException
     * @throws EmailAddressShouldContainsArobaseException
     */
    public function __construct(?string $emailAddress)
    {
        $this->validate($emailAddress);

        $this->emailAddress = $emailAddress;
    }

    /**
     * @param $value
     *
     * @throws EmailAddressIsEmptyException
     * @throws EmailAddressIsNotValidException
     * @throws EmailAddressShouldContainsArobaseException
     */
    public function validate($value): void
    {
        if (empty($value)) {
            throw new EmailAddressIsEmptyException([$value]);
        }

        if (!strpos($value, '@')) {
            throw new EmailAddressShouldContainsArobaseException();
        }

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new EmailAddressIsNotValidException([$value]);
        }
    }

    /**
     * @param mixed|null $value
     *
     * @return bool
     */
    public function isValid($value = null): bool
    {
        return parent::isValid($this->emailAddress);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->emailAddress;
    }

    /**
     * @return string
     */
    public function domain(): string
    {
        return substr($this->emailAddress, strpos($this->emailAddress, '@') + 1, strlen($this->emailAddress));
    }
}