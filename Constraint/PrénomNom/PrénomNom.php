<?php

namespace Aroban\Component\Domain\Constraint\PrénomNom;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class PrénomNom extends Constraint
{
    public string $message = 'Certains caractères ne sont pas autorisés.';
}
