<?php

namespace Atournayre\Component\Domain\Constraint\Nom;

use Atournayre\Component\Domain\Constraint\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotEqualTo;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class NomValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Nom) {
            throw new UnexpectedTypeException($constraint, Nom::class);
        }

        $this->validateConstraints($value, [
            new NotBlank(),
            new NotNull(),
            new NotEqualTo(''),
            new Length([
                   'min' => 3,
               ]),
        ]);
    }
}
