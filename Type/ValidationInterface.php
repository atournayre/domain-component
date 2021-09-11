<?php

namespace Atournayre\Component\Domain\Type;

use Atournayre\Component\Domain\Exception\Exception;

interface ValidationInterface
{
    /**
     * @throws Exception
     */
    public function validate();

    /**
     * @throws bool
     */
    public function isValid();
}