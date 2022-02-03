<?php

namespace Atournayre\Component\Domain\Constraint\PrénomNom;

use Atournayre\Component\Domain\Constraint\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class PrénomNomValidator extends ConstraintValidator
{
    private const CARACTERES_AUTORISES = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u";

    /**
     * @inheritDoc
     */
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof PrénomNom) {
            throw new UnexpectedTypeException($constraint, PrénomNom::class);
        }

        $this->validateConstraints($value, [
            new Regex(
                self::CARACTERES_AUTORISES,
                $constraint->message
            ),
        ]);
    }
}
