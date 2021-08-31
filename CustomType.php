<?php

namespace Atournayre\Component\Domain;

use Atournayre\Component\Domain\Exception\Exception;
use Atournayre\Component\Domain\Exception\ExceptionInterface;

class CustomType implements ValidationInterface
{
    public function validate()
    {
    }

    public function isValid()
    {
        try {
            $this->validate();
            return true;
        } catch (ExceptionInterface $e) {
            return false;
        }
    }
}