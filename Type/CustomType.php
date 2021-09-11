<?php

namespace Atournayre\Component\Domain\Type;

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