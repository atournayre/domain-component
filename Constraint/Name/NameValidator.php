<?php

namespace Atournayre\Component\Domain\Constraint\Name;

use Atournayre\Component\Domain\Constraint\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotEqualTo;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class NameValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Name) {
            throw new UnexpectedTypeException($constraint, Name::class);
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
