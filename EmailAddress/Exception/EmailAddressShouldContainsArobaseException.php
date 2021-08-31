<?php

namespace Atournayre\Component\Domain\EmailAddress\Exception;

use Atournayre\Component\Domain\Exception\Exception;

final class EmailAddressShouldContainsArobaseException extends Exception
{
    public function getMessageKey(): string
    {
        return 'Email address should contains @.';
    }
}