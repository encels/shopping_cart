<?php

namespace Src\Carts\Application;

use Src\Carts\Domain\CartEntity;
use Src\Carts\Domain\Contracts\CartRepositoryInterface;
use Src\Shared\Domain\ValueObjects\Id;

class CreateCartUseCase
{
private $cartRepository;

public function __construct(CartRepositoryInterface $cartRepository)
{
$this->cartRepository = $cartRepository;
}

public function execute(CartEntity $cart): Id
{
return $this->cartRepository->save($cart);
}
}