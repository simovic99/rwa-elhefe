<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 *
 */
class OrderProduct extends Model
{
    protected $table = 'orderproduct';
    protected $fillable = ['order_id', 'product_id', 'quantity'];
}
