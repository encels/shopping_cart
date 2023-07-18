<?php

namespace Src\OrderItems\Application;

use Src\OrderItems\Domain\Exceptions\OrderItemException;

class CreateOrderItemFromArrayUseCase
{
    private $createOrder;

    public function __construct(CreateOrderItemUseCase $createOrder)
    {
        $this->createOrder = $createOrder;
    }

    public function execute(array $items, $orderId): bool
    {
        $items = collect($items);
        $success = $items->every(function ($item) use ($orderId) {
            $productId = $item['productId'];
            $quantity = $item['quantity'];

            try {
                $this->createOrder->execute($orderId, $productId, $quantity);
                return true;
            } catch (\Exception $e) {
                throw new OrderItemException($e->getMessage());
                return false;
            }
        });

        return $success;
    }
}
