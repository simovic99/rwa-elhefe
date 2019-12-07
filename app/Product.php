<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $product_code
 * @property string $product_name
 * @property string $product_type
 * @property string $product_desc
 * @property string $product_img_name
 * @property int $qty
 * @property float $price
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_code', 'product_name', 'product_type', 'product_desc', 'product_img_name', 'qty', 'price'];

}
