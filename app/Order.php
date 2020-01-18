<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Order extends Model
{
    //
    use Sortable;

    protected $table='orders';
          protected $fillable = [
              'user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city',
             'billing_phone', 'billing_total','status',
          ];
    protected $sortable = [
        'user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city',
        'billing_phone', 'billing_total','created_at','status',
    ];

    public function user()
    {

        return $this->belongsTo('App\User');
    }
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
}
