<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\DeleteCartUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteCart
{
    private $repository;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function delete(int $id): void
    {
        $deleteCartUseCase = new DeleteCartUseCase($this->repository);

        $deleteCartUseCase->execute(new Id($id));
    }
}
