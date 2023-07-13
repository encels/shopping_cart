<?php

namespace Src\Carts\Domain\Contracts;

use Src\Carts\Domain\CartEntity;
use Src\Shared\Domain\ValueObjects\Id;

/**
 * Interface CartRepository.
 *
 * Defines the methods that a repository for the CartEntityEntity class must implement.
 */
interface CartRepositoryInterface
{
    /**
     * Gets a cart by its id.
     *
     * @param int The id of the cart to get.
     *
     * @return CartEntity|null The cart, or null if the cart does not exist.
     */
    public function getById(Id $id): ?CartEntity;

    /**
     * Creates a new cart.
     *
     * @param CartEntity $cart The cart to save.
     *
     * @return int The created cart id.
     */
    public function save(CartEntity $cart): Id;

    /**
     * Updates a cart.
     *
     * @param CartEntity $cart The cart to update.
     *
     * @return CartEntity The updated cart.
     */
    public function update(CartEntity $cart): CartEntity;

    /**
     * Deletes a cart.
     *
     * @param int The id of the cart to delete.
     *
     * @return void 
     */
    public function delete(Id $id): void;
}
