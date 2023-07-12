<?php

namespace Src\Products\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'sku',
        'name',
        'description',
        'price',
    ];

}
