<?php

namespace Src\Carts\Infrastructure;

use Src\Carts\Application\DeleteCartUseCase;
use Src\Carts\Infrastructure\Eloquent\Repositories\EloquentCartRepository;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteCart
{
    private $deleteCartUseCase;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->deleteCartUseCase = new DeleteCartUseCase($repository);
    }

    public function delete(int $id): void
    {
        $this->deleteCartUseCase->execute(new Id($id));
    }
}
