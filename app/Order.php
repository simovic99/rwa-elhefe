<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 *
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'product_id', 'user_id'];

}
