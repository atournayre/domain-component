<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\Nom;

use Doctrine\ORM\Mapping as ORM;

trait NomTrait
{
    /**
     * @var string|Nom|null
     */
    #[ORM\Column]
    #[\Atournayre\Component\Domain\Constraint\Nom]
    public string|Nom|null $name;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return (string) $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return $this
     */
    public function setNom(?string $name): static
    {
        $this->name = new Nom($name);
        return $this;
    }
}