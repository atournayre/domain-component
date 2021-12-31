<?php

namespace Atournayre\Component\Domain\Constraint\AdresseEmail;

use Atournayre\Component\Domain\Constraint\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class AdresseEmailValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof AdresseEmail) {
            throw new UnexpectedTypeException($constraint, AdresseEmail::class);
        }

        $this->validateConstraints($value, [
            new Email(),
        ]);
    }
}
