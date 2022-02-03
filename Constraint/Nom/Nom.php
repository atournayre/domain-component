<?php
declare(strict_types=1);

namespace Aroban\Component\Domain\Constraint\Nom;

use Aroban\Component\Domain\Constraint\PrénomNom\PrénomNom;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Nom extends PrénomNom
{
    public string $message = 'Le nom contient des caractères non autorisés.';
}
