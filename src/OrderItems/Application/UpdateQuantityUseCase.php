<?php

namespace Src\OrderItems\Application;

use Src\OrderItems\Domain\OrderItemEntity;
use Src\OrderItems\Domain\Contracts\OrderItemRepositoryInterface;
use  Src\Shared\Domain\ValueObjects\Quantity;
use Src\Shared\Domain\ValueObjects\Id;

class UpdateQuantityUseCase
{
    private $repository;

    public function __construct(OrderItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, int $quantity): OrderItemEntity
    {
       return $this->repository->updateQuantity(new Id($id), new Quantity($quantity));
    }
}
