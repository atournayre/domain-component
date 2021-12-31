<?php

namespace Atournayre\Component\Domain\Constraint\NomDeFamille;

use Atournayre\Component\Domain\Constraint\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotEqualTo;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class NomDeFamilleValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof NomDeFamille) {
            throw new UnexpectedTypeException($constraint, NomDeFamille::class);
        }

        $this->validateConstraints($value, [
            new Regex([
                'pattern' => "/\d/",
                'match'   => false,
                'message' => 'Votre nom de famille contient un nombre.',
            ]),
            new NotBlank(),
            new NotNull(),
            new NotEqualTo(''),
            new Length([
               'min' => 3,
           ]),
        ]);
    }
}
