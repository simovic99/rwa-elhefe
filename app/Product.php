<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Gloudemans\Shoppingcart\Contracts\Buyable;




/**
 * @property int $id
 * @property string $product_code
 * @property string $product_name
 * @property string $product_type
 * @property string $product_desc
 * @property string $product_img_name

 * @property float $price
 */
class Product extends Model implements Buyable
{
    use Sortable;

    /**ph
     * @var array
     */
    protected $fillable = [ 'product_name', 'product_desc', 'product_img_name',  'price'];
    public $timestamps = false;
    public $sortable = ['id','product_name','price'];
    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    public function getBuyableDescription($options = null) {
        return $this->product_name;
    }

    public function getBuyablePrice($options = null) {
        return $this->price;
    }


}
