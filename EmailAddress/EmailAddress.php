<?php

namespace Atournayre\Component\Domain\EmailAddress;

use Atournayre\Component\Domain\CustomType;
use Atournayre\Component\Domain\EmailAddress\Exception\EmailAddressIsNotValidException;
use Atournayre\Component\Domain\EmailAddress\Exception\EmailAddressIsEmptyException;
use Atournayre\Component\Domain\EmailAddress\Exception\EmailAddressShouldContainsArobaseException;
use Atournayre\Component\Domain\Exception\ExceptionInterface;
use Atournayre\Component\Domain\ValidationInterface;

class EmailAddress extends CustomType implements ValidationInterface
{
    private ?string $emailAddress;

    public function __construct(?string $emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @throws ExceptionInterface
     */
    public function validate(): void
    {
        if (empty($this->emailAddress)) {
            throw new EmailAddressIsEmptyException([$this->emailAddress]);
        }

        if (!strpos($this->emailAddress, '@')) {
            throw new EmailAddressShouldContainsArobaseException();
        }

        if (!filter_var($this->emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new EmailAddressIsNotValidException([$this->emailAddress]);
        }
    }

    public function __toString(): string
    {
        return $this->emailAddress;
    }

    public function domain()
    {
        return substr($this->emailAddress, strpos($this->emailAddress, '@') + 1, strlen($this->emailAddress));
    }
}