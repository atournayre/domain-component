<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\NomDeFamille;

use Doctrine\ORM\Mapping as ORM;

trait NomDeFamilleTrait
{
    /**
     * @var string|NomDeFamille|null
     */
    #[ORM\Column]
    #[\Atournayre\Component\Domain\Constraint\NomDeFamille\NomDeFamille]
    public string|NomDeFamille|null $nomDeFamille;

    /**
     * @return string
     */
    public function getNomDeFamille(): string
    {
        return (string) $this->nomDeFamille;
    }

    /**
     * @param string|null $nomDeFamille
     *
     * @return $this
     */
    public function setNomDeFamille(?string $nomDeFamille): static
    {
        $this->nomDeFamille = new NomDeFamille($nomDeFamille);
        return $this;
    }
}
