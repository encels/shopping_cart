<?php

namespace Src\Orders\Domain;

use Src\Shared\Domain\ValueObjects\Id;
use Src\Shared\Domain\ValueObjects\Price;

class OrderEntity
{
    private $id;
    private $items = [];
    private $totalAmount;

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
            'items' => $this->items,
            'totalAmount' => $this->totalAmount->getValue()
        );
    }

    public function getItemsCount(): int
    {
        return count($this->items);
    }

    public function getTotalAmount(): Price
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(Price $totalAmount): Price
    {
        return $this->totalAmount = $totalAmount;
    }
}
