<?php

namespace Src\Carts\Infrastructure\Eloquent\Repositories;

use Src\Carts\Domain\CartEntity;
use Src\Carts\Domain\Contracts\CartRepositoryInterface;
use Src\Carts\Infrastructure\Eloquent\CartModel;
use Src\Shared\Domain\ValueObjects\Id;

class EloquentCartRepository implements CartRepositoryInterface
{
    /**
     * The cart model instance.
     *
     * @var CartModel
     */
    private $cartModel;

    /**
     * Create a new EloquentCartRepository instance.
     *
     * 
     *
     * @return void
     */
    public function __construct()
    {
        $this->cartModel = new CartModel;
    }

 
    /**
     * Get a cart by its id.
     *
     * @param Id $id The id of the cart to get.
     *
     * @return CartEntity|null The cart, or null if the cart does not exist.
     */
    public function getById(Id $id): ?CartEntity
    {
        $cartModel = $this->cartModel->find($id->getValue());

        if (!$cartModel) {
            return null;
        }

        $cartEntity = new CartEntity(); 
        $cartEntity->setId(new Id($cartModel->id));
        return $cartEntity  ;
    }

    /**
     * Create a new cart.
     *
     * @param CartEntity $cart The cart to save.
     *
     * @return Id The created cart id.
     */
    public function save(CartEntity $cart): Id
    {
        $cartModel = new $this->cartModel();

        $cartModel->saveOrFail();

        return new Id($cartModel->id);
    }

    /**
     * Update a cart.
     *
     * @param CartEntity $cart The cart to update.
     *
     * @return CartEntity The updated cart.
     */
    public function update(CartEntity $cart): CartEntity
    {
        $cartModel = $this->cartModel->find($cart->getId()->getValue());

        $cartModel->save();

        return $cart;
    }

    /**
     * Delete a cart.
     *
     * @param Id $id The id of the cart to delete.
     *
     * @return void
     */
    public function delete(Id $id): void
    {
        $this->cartModel->destroy($id->getValue());
    }
}
