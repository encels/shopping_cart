<?php

namespace Src\OrderItems\Application;

use Src\OrderItems\Domain\OrderItemEntity;
use Src\OrderItems\Domain\Contracts\OrderItemRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class GetOrderItemByIdUseCase
{
    private OrderItemRepositoryInterface $repository;

    public function __construct(OrderItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ?OrderItemEntity
    {
        return $this->repository->getById(new Id($id));
    }
}
