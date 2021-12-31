<?php

namespace Atournayre\Component\Domain\Type;

use Atournayre\Component\Domain\Exception\Exception;

interface ValidationInterface
{
    /**
     * @param mixed $value
     *
     * @throws Exception
     */
    public function validate($value);

    /**
     * @param mixed $value
     *
     * @throws bool
     */
    public function isValid($value);
}