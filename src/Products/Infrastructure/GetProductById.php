<?php

namespace Src\Products\Infrastructure;

use Src\Products\Application\GetProductByIdUseCase;
use Src\Products\Domain\ProductEntity;

class GetProductById
{
    protected $getProductById;

    public function __construct(GetProductByIdUseCase $getProductById)
    {
        $this->getProductById = $getProductById;
    }

    public function execute(int $id): ?ProductEntity
    {
        return $this->getProductById->execute($id);
    }
}
