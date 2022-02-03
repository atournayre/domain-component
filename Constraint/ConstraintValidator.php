<?php

namespace Atournayre\Component\Domain\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator as SymfonyConstraintValidator;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

class ConstraintValidator extends SymfonyConstraintValidator
{
    /**
     * @param mixed|null              $value
     * @param array|Constraint[]|null $constraints
     *
     * @return bool
     */
    public static function hasViolations($value = null, array $constraints = null): bool
    {
        return self::createContraintsViolations($value, $constraints)
            ->has(0);
    }

    /**
     * @param mixed|null              $valeur
     * @param array|Constraint[]|null $contraintes
     *
     * @return ConstraintViolationListInterface
     */
    public static function createContraintsViolations(
        $valeur = null,
        array $contraintes = null
    ): ConstraintViolationListInterface
    {
        return (Validation::createValidator())
            ->validate($valeur, $contraintes);
    }

    /**
     * @param mixed      $value
     * @param Constraint $constraint
     *
     * @return void
     */
    public function validate($value, Constraint $constraint): void
    {
    }

    /**
     * @param mixed|null              $value
     * @param array|Constraint[]|null $constraints
     *
     * @return void
     */
    protected function validateConstraints($value = null, array $constraints = null): void
    {
        $violations = self::createContraintsViolations($value, $constraints);

        foreach ($violations as $violation) {
            $this->context->buildViolation($violation->getMessage())
                ->setInvalidValue($violation->getInvalidValue())
                ->setCode($violation->getCode())
                ->addViolation();
        }
    }
}
