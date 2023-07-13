<?php

namespace Src\Carts\Application;

use Src\Carts\Domain\Contracts\CartRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class DeleteCartUseCase
{
    private $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function execute(Id $id): void
    {
        $this->cartRepository->delete($id);
    }
}
