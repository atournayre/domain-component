<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\EmailAddress;

use Atournayre\Component\Domain\Type\CustomType;
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
     * @return bool
     */
    public function isValid(): bool
    {
        return parent::checkIfIsValid($this->emailAddress, [
            new \Atournayre\Component\Domain\Constraint\EmailAddress\EmailAddress(),
        ]);
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
        return substr(
            $this->emailAddress,
            strpos($this->emailAddress, '@') + 1,
            strlen($this->emailAddress)
        );
    }
}