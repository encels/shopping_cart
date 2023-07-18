<?php

namespace Src\Carts\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Src\CartItems\Infrastructure\Eloquent\CartItemModel;

class CartModel extends Model
{
    protected $table = 'carts';
    public $timestamps = false;

    protected $fillable = [
    ];

    public function items()
    {
        return $this->hasMany(CartItemModel::class,'cart_id');
    }

}
