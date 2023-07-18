<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Products\Infrastructure\Eloquent\ProductModel;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ProductModel::factory()->count(30)->create();
    }
}
