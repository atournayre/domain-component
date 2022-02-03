<?php
declare(strict_types=1);

namespace Aroban\Component\Domain\Type\AdresseEmail;

use Doctrine\ORM\Mapping as ORM;

trait AdresseEmailTrait
{
    /**
     * @var string|AdresseEmail|null
     */
    #[ORM\Column]
    #[\Aroban\Component\Domain\Constraint\AdresseEmail\AdresseEmail]
    public string|AdresseEmail|null $adresseEmail;

    /**
     * @return string
     */
    public function getAdresseEmail(): string
    {
        return (string) $this->adresseEmail;
    }

    /**
     * @param string|null $adresseEmail
     *
     * @return $this
     */
    public function setAdresseEmail(?string $adresseEmail): static
    {
        $this->adresseEmail = new AdresseEmail($adresseEmail);
        return $this;
    }
}
