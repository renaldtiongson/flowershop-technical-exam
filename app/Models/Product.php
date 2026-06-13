<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'product_description',
        'quantity',
        'price',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}
