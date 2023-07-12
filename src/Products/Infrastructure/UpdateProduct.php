<?php

namespace Src\Products\Infrastructure;

use Src\Products\Application\UpdateProductUseCase;
use Src\Products\Domain\ProductEntity;

class UpdateProduct
{
    protected $updateProduct;

    public function __construct(UpdateProductUseCase $updateProduct)
    {
        $this->updateProduct = $updateProduct;
    }

    public function execute(ProductEntity $product): void
    {
    
        $this->updateProduct->execute($product);
    }
}
