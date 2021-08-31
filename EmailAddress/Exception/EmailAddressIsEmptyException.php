<?php

namespace Atournayre\Component\Domain\EmailAddress\Exception;

use Atournayre\Component\Domain\Exception\Exception;

final class EmailAddressIsEmptyException extends Exception
{
    public function getMessageKey(): string
    {
        return 'Email address "%s" is empty.';
    }
}