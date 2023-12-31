<?php

namespace Src\CartItems\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;

class CartItemModel extends Model
{
    protected $table = 'cart_items';
    public $timestamps = false;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity'
    ];

}
