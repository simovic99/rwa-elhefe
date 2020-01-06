<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
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
    use Sortable;

    /**
     * @var array
     */
    protected $fillable = [ 'product_name', 'product_desc', 'product_img_name', 'qty', 'price'];
    public $timestamps = false;
    public $sortable = ['id','product_name','price'];

}
