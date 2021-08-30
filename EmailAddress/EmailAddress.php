<?php

namespace Atournayre\Component\Domain\EmailAddress;

use Atournayre\Component\Domain\EmailAddress\Exception\EmailAddressException;
use Atournayre\Component\Domain\Exception\ExceptionInterface;
use Atournayre\Component\Domain\ValidationInterface;

class EmailAddress implements ValidationInterface
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
        if (null === $this->emailAddress || '' === $this->emailAddress) {
            throw EmailAddressException::emailIsEmpty($this->emailAddress);
        }

        if (!strpos($this->emailAddress, '@')) {
            throw EmailAddressException::emailShouldContainsArobase($this->emailAddress);
        }

        if (!filter_var($this->emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw EmailAddressException::emailIsNotValid($this->emailAddress);
        }
    }

    public function isValid(): bool
    {
        try {
            $this->validate();
            return true;
        } catch (ExceptionInterface $e) {
            return false;
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