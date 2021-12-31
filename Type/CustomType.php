<?php

namespace Atournayre\Component\Domain\Type;

use Atournayre\Component\Domain\Exception\ExceptionInterface;

class CustomType implements ValidationInterface
{
    /**
     * @inheritDoc
     */
    public function validate($value) {}

    /**
     * @param mixed|null $value
     *
     * @return bool
     */
    public function isValid($value = null): bool
    {
        try {
            $this->validate($value);
            return true;
        } catch (ExceptionInterface $e) {
            return false;
        }
    }
}