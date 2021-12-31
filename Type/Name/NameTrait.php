<?php
declare(strict_types=1);

namespace Atournayre\Component\Domain\Type\Name;

use Doctrine\ORM\Mapping as ORM;

trait NameTrait
{
    /**
     * @var string|Name|null
     */
    #[ORM\Column]
    #[\Atournayre\Component\Domain\Constraint\Name]
    public string|Name|null $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return (string) $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return $this
     */
    public function setName(?string $name): static
    {
        $this->name = new Name($name);
        return $this;
    }
}