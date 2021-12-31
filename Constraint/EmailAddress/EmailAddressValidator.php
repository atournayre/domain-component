<?php

namespace Atournayre\Component\Domain\Constraint\EmailAddress;

use Atournayre\Component\Domain\Constraint\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class EmailAddressValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof EmailAddress) {
            throw new UnexpectedTypeException($constraint, EmailAddress::class);
        }

        $this->validateConstraints($value, [
            new Email(),
        ]);
    }
}
