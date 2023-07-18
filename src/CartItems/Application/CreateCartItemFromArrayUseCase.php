<?php

namespace Src\CartItems\Application;

use Src\CartItems\Domain\Exceptions\CartItemException;

class CreateCartItemFromArrayUseCase
{
    private $createCart;

    public function __construct(CreateCartItemUseCase $createCart)
    {
        $this->createCart = $createCart;
    }

    public function execute(array $items, $cartId): bool
    {
        $items = collect($items);
        $success = $items->every(function ($item) use ($cartId) {
            $productId = $item['productId'];
            $quantity = $item['quantity'];

            try {
                $this->createCart->execute($cartId, $productId, $quantity);
                return true;
            } catch (\Exception $e) {
                throw new CartItemException($e->getMessage());
                return false;
            }
        });

        return $success;
    }
}
