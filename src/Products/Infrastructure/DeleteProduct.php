<?php

namespace Src\Products\Infrastructure;

use Src\Products\Application\DeleteProductUseCase;
use Src\Products\Domain\ProductEntity;


class DeleteProduct
{
    protected  $deleteProduct;

    public function __construct(DeleteProductUseCase $deleteProduct)
    {
        $this->deleteProduct = $deleteProduct;
    }
    public function delete(ProductEntity $product): void
    {
        $this->deleteProduct->execute($product);
    }
}
