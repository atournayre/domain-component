<?php

namespace Atournayre\Component\Domain\Traits;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

trait UUIDTrait
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    protected ?UuidInterface $id;

    public function getId(): ?UuidInterface
    {
        return $this->id;
    }
}
