<?php

namespace Src\Orders\Infrastructure\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Src\OrderItems\Infrastructure\Eloquent\OrderItemModel;

class OrderModel extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = [
        'total_amount'
    ];

    public function items()
    {
        return $this->hasMany(OrderItemModel::class,'order_id');
    }

}
