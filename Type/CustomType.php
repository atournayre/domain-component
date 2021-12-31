<?php

namespace Atournayre\Component\Domain\Type;

use Atournayre\Component\Domain\Exception\ExceptionInterface;

class CustomType implements ValidationInterface
{
    /**
     * @inheritDoc
     */
    public function validate() {}

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        try {
            $this->validate();
            return true;
        } catch (ExceptionInterface $e) {
            return false;
        }
    }
}