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
     */
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