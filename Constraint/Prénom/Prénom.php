<?php

namespace Atournayre\Component\Domain\Constraint\Prénom;

use Atournayre\Component\Domain\Constraint\PrénomNom\PrénomNom;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Prénom extends PrénomNom
{
    public string $message = 'Le prénom contient des caractères non autorisés.';
}
