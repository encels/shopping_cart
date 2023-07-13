<?php

namespace Src\Products\Domain\Contracts;

use Src\Products\Domain\ProductEntity;
use Src\Shared\Domain\ValueObjects\Id;

interface ProductRepositoryInterface
{
    /**
     * Get a product by its ID.
     *
     * @param int $id
     * @return ProductEntity|null
     */
    public function getById(Id $id): ?ProductEntity;

    /**
     * Save a product.
     *
     * @param ProductEntity $product
     * @return Id
     */
    public function save(ProductEntity $product): Id;

    /**
     * Delete a product.
     *
     * @param Id
     * @return void
     */
    public function delete(Id $id): void;

}
