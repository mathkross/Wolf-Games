<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'address', 'city', 'state', 'zipcode', 'product_id', 'name', 'price', 'units'];
    protected $table = 'order_product';

    public function Products()
    {
        return $this->belongsToMany(Product::class)->withPivot('name', 'price', 'units');
    }
}
