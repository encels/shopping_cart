<?php

namespace Src\OrderItems\Application;

use Src\OrderItems\Domain\OrderItemEntity;
use Src\OrderItems\Domain\Contracts\OrderItemRepositoryInterface;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;

class CreateOrderItemUseCase
{
    private $repository;

    public function __construct(OrderItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $orderId, int $productId, int $quantity): Id
    {
        $orderItem = new OrderItemEntity(
            new Id($orderId),
            new Id($productId),
            new Quantity($quantity)
        );
        return $this->repository->save($orderItem);
    }
}
