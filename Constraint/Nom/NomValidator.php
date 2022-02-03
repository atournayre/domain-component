<?php

namespace Atournayre\Component\Domain\Constraint\Nom;

use Atournayre\Component\Domain\Constraint\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class NomValidator extends ConstraintValidator
{
    private const CARACTERES_AUTORISES = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u";

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Nom) {
            throw new UnexpectedTypeException($constraint, Nom::class);
        }

        $this->validateConstraints($value, [
            new Regex([
                'pattern' => self::CARACTERES_AUTORISES,
                'match' => true,
                'message' => 'Le nom contient des caractères non autorisés.',
            ]),
        ]);
    }
}
