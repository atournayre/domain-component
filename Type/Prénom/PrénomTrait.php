<?php
declare(strict_types=1);

namespace Aroban\Component\Domain\Type\Prénom;

use Doctrine\ORM\Mapping as ORM;

trait PrénomTrait
{
    /**
     * @var string|Prénom|null
     */
    #[ORM\Column]
    #[\Aroban\Component\Domain\Constraint\Prénom\Prénom]
    public string|Prénom|null $prénom;

    /**
     * @return string
     */
    public function getPrénom(): string
    {
        return (string) $this->prénom;
    }

    /**
     * @param string|null $prénom
     *
     * @return $this
     */
    public function setPrénom(?string $prénom): static
    {
        $this->prénom = new Prénom($prénom);
        return $this;
    }
}