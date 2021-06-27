<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id', 'product_name', 'image','vendor_id','user_id','quantity','order_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}


