<?php

namespace Src\Products\Domain\Contracts;

use Src\Products\Domain\ProductEntity;

interface ProductRepositoryInterface
{
    /**
     * Get a product by its ID.
     *
     * @param int $id
     * @return ProductEntity|null
     */
    public function getById(int $id): ?ProductEntity;

    /**
     * Save a product.
     *
     * @param ProductEntity $product
     * @return void
     */
    public function save(ProductEntity $product): int;

    /**
     * Delete a product.
     *
     * @param ProductEntity $product
     * @return void
     */
    public function delete(ProductEntity $product): void;
}
