<?php

namespace  Src\Products\Domain;

use  Src\Products\Domain\ValueObjects\Description;
use  Src\Products\Domain\ValueObjects\Name;
use  Src\Products\Domain\ValueObjects\Price;
use  Src\Products\Domain\ValueObjects\Sku;
use Src\Shared\Domain\ValueObjects\Id;

class ProductEntity
{
    private Id $id;
    private Sku $sku;
    private Name $name;
    private ?Description $description;
    private Price $price;
    private \DateTimeImmutable $createdAt;
    private \DateTimeImmutable $updatedAt;

    public function __construct(Id $id,
        Sku $sku,
        Name $name,
        ?Description $description,
        Price $price,
        ?\DateTimeImmutable $createdAt,
        ?\DateTimeImmutable $updatedAt
    ) {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getSku(): Sku
    {
        return $this->sku;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getDescription(): ?Description
    {
        return $this->description;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
