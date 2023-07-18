<?php

namespace Src\Products\Infrastructure\Eloquent\Repositories;

use  Src\Products\Domain\ValueObjects\Description;
use  Src\Products\Domain\ValueObjects\Name;
use  Src\Shared\Domain\ValueObjects\Price;
use  Src\Products\Domain\ValueObjects\Sku;
use Src\Products\Domain\Contracts\ProductRepositoryInterface;
use Src\Products\Domain\ProductEntity;
use Src\Products\Infrastructure\Eloquent\ProductModel;
use Src\Shared\Domain\ValueObjects\Id;

class EloquentProductRepository implements ProductRepositoryInterface
{

    private ProductModel $model;

    public function __construct()
    {
        $this->model = new ProductModel;
    }

    /**
     * Get a product by its ID.
     *
     * @param Id 
     * @return ProductEntity|null
     */
    public function getById(Id $id): ?ProductEntity
    {
        $product = $this->model->find($id->getValue());

        if (!$product) {
            return null;
        }

        $sku = new Sku($product->sku);
        $name = new Name($product->name);
        $description = new Description($product->description);
        $price = new Price($product->price);
        $id = $product->id;
 
        $productEntity = new ProductEntity($sku, $name, $description, $price);
        $productEntity->setId(new Id($id));

        return $productEntity;
    }

    /**
     * Save a product.
     *
     * @param ProductEntity $product
     * @return int
     */
    public function save(ProductEntity $product): Id
    {
        $eloquentProduct = $this->model;
        $eloquentProduct->sku = $product->getSku()->getValue();
        $eloquentProduct->name = $product->getName()->getValue();
        $eloquentProduct->description = $product->getDescription()->getValue();
        $eloquentProduct->price = $product->getPrice()->getValue();
        $eloquentProduct->saveOrFail();

        return new Id($eloquentProduct->id);
    }

    /**
     * Delete a product.
     *
     * @param ProductEntity $product
     * @return void
     */
    public function delete(Id $id): void
    {
        ProductModel::destroy($id->getValue());
    }

}
