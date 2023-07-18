<?php

namespace Src\OrderItems\Domain;

use  Src\Shared\Domain\Exceptions\QuantityException;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;
use Src\Shared\Domain\ValueObjects\Price;

class OrderItemEntity
{
    private $id;
    private $orderId;
    private $productId;
    private $quantity;
    private $unitPrice;
    


    public function __construct(Id $orderId, Id $productId, Quantity $quantity, Price $price)
    {
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->unitPrice = $price;
    }

    public function getId(): ?Id
    {
        return $this?->id;
    }

    public function setId(Id $id): void
    {
        $this->id = $id;
    }

    public function getOrderId(): Id
    {
        return $this->orderId;
    }

    public function getProductId(): Id
    {
        return $this->productId;
    }

    public function getQuantity(): Quantity
    {
        return $this->quantity;
    }

    public function setQuantity(Quantity $qty): void
    {
        $this->quantity = $qty;
    }

    public function getUnitPrice(): Price
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(Price $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }



    public function toArray(): array
    {
        return array(
            'id' => $this->id ? $this->id->getValue() : null,
            'orderId' => $this->orderId->getValue(),
            'productId' => $this->productId->getValue(),
            'quantity' => $this->quantity->getValue(),
            'unit_price' => $this->quantity->getValue()

        );
    }

}
