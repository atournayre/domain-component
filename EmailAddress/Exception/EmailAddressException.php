<?php

namespace Atournayre\Component\Domain\EmailAddress\Exception;

use Atournayre\Component\Domain\Exception\Exception;

final class EmailAddressException extends Exception
{
    public static function emailIsEmpty(?string $emailAddress = null): Exception
    {
        return new self(sprintf('Email address "%s" is empty.', $emailAddress));
    }

    public static function emailIsNotValid(?string $emailAddress = null): Exception
    {
        return new self(sprintf('Email address "%s" is not valid.', $emailAddress));
    }

    public static function emailShouldContainsArobase(): Exception
    {
        return new self(sprintf('Email address should contains @.'));
    }
}