<?php

namespace Src\Orders\Infrastructure;

use Src\Orders\Application\GetOrderByIdUseCase;
use Src\Orders\Infrastructure\Eloquent\Repositories\EloquentOrderRepository;
use Src\Orders\Domain\OrderEntity;
use Src\Shared\Domain\ValueObjects\Id;

class GetOrderById
{
    private $getOrderByIdUseCase;

    public function __construct(EloquentOrderRepository $repository)
    {
        $this->getOrderByIdUseCase = new GetOrderByIdUseCase($repository);
    }

    public function getById(int $id): ?OrderEntity
    {
        return $this->getOrderByIdUseCase->execute(new Id($id));
    }
}
