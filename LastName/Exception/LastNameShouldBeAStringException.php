<?php

namespace Atournayre\Component\Domain\LastName\Exception;

use Atournayre\Component\Domain\Exception\Exception;

class LastNameShouldBeAStringException extends Exception
{
    public function getMessageKey(): string
    {
        return 'A lastname must contains only alpha characters. You provide "%s" as lastname.';
    }
}