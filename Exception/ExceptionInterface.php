<?php

namespace Aroban\Component\Domain\Exception;

interface ExceptionInterface extends \Throwable
{
    public function getMessageKey(): string;

    public function getMessageData(): array;
}
