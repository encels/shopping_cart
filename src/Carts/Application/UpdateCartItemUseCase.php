<?php

namespace Src\Carts\Application;

use Src\Carts\Domain\CartEntity;
use Src\Carts\Domain\Contracts\CartRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class UpdateCartItemUseCase
{
    private $cartRepository;

    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function execute(Id $id, array $items): void
    {
        $this->cartRepository->updateItems($id, $items);
    }
}
