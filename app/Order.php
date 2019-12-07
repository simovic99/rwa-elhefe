<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $product_code
 * @property string $product_name
 * @property string $product_desc
 * @property int $price
 * @property int $units
 * @property int $total
 * @property string $date
 * @property string $email
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_code', 'product_name', 'product_desc', 'price', 'units', 'total', 'date', 'email'];

}
