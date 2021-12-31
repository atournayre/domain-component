<?php

namespace Atournayre\Component\Domain\Type;

interface ValidationInterface
{
    /**
     * @throws bool
     */
    public function isValid();
}