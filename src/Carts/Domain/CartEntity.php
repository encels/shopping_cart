<?php

namespace Src\Carts\Domain;

use Src\Shared\Domain\ValueObjects\Id;

class CartEntity
{
    private $id;
    private $items = [];

    public function __construct()
    {
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function setId(Id $id): void
    {
        $this->id = $id;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function toArray(): array
    {
        return array(
            'id' => $this->id ? $this->id->getValue() : null,
            'items' => $this->items
        );
    }

    public function getItemsCount(): int
    {
        return count($this->items);
    }
}
