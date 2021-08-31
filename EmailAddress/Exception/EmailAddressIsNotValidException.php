<?php

namespace Atournayre\Component\Domain\EmailAddress\Exception;

use Atournayre\Component\Domain\Exception\Exception;

class EmailAddressIsNotValidException extends Exception
{
    public function getMessageKey(): string
    {
        return 'Email address "%s" is not valid.';
    }
}