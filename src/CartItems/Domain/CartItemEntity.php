<?php

namespace Src\CartItems\Domain;

use Src\CartItems\Domain\Exceptions\QuantityException;
use Src\CartItems\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;

class CartItemEntity
{
    private $id;
    private $cartId;
    private $productId;
    public $quantity;


    public function __construct(Id $cartId, Id $productId, Quantity $quantity)
    {
        $this->cartId = $cartId;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function getId(): ?Id
    {
        return $this?->id;
    }

    public function setId(Id $id): void
    {
        $this->id = $id;
    }

    public function getCartId(): Id
    {
        return $this->cartId;
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

    public function toArray(): array
    {
        return array(
            'id' => $this->id ? $this->id->getValue() : null,
            'cartId' => $this->cartId->getValue(),
            'productId' => $this->productId->getValue(),
            'quantity' => $this->quantity->getValue()
        );
    }

}
