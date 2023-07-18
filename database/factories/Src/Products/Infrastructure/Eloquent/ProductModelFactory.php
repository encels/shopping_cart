<?php

namespace Database\Factories\Src\Products\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Products\Infrastructure\Eloquent\ProductModel;

class ProductModelFactory extends Factory
{
    protected $model = ProductModel::class;

    public function definition()
    {
        return [
            'sku' => $this-> faker->regexify('[A-Z0-9]{10}'),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
