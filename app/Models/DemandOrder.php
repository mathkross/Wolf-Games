<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandOrder extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'address', 'city', 'state', 'zipcode', 'demand_id', 'name', 'price', 'units'];

    public function Demands()
    {
        return $this->belongsToMany(Demand::class)->withPivot('name','price','units');
    }
}
