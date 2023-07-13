<?php

namespace Src\Carts\Domain;

use Src\Shared\Domain\ValueObjects\Id;

class CartEntity
{
    private $id;
    private $createdAt;
    private $updatedAt;

    public function __construct(Id $id, \DateTimeImmutable $createdAt, \DateTimeImmutable $updatedAt)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
