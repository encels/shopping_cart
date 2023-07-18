<?php

namespace  Src\Products\Domain;

use  Src\Products\Domain\ValueObjects\Description;
use  Src\Products\Domain\ValueObjects\Name;
use  Src\Shared\Domain\ValueObjects\Price;
use  Src\Products\Domain\ValueObjects\Sku;
use Src\Shared\Domain\ValueObjects\Id;

class ProductEntity
{
    private Id $id;
    private Sku $sku;
    private Name $name;
    private ?Description $description;
    private Price $price;

    public function __construct(
        Sku $sku,
        Name $name,
        ?Description $description,
        Price $price
    ) {
        $this->sku = $sku;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
      
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function setId(Id $id): void
    {
        $this->id = $id;
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
}
