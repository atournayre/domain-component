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
    public string|Nom|null $nom;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return (string) $this->nom;
    }

    /**
     * @param string|null $nom
     *
     * @return $this
     */
    public function setNom(?string $nom): static
    {
        $this->nom = new Nom($nom);
        return $this;
    }
}