<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdDemand extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'address', 'city', 'state', 'zipcode', 'Demand_id', 'name', 'price', 'units'];

    public function Demands()
    {
        return $this->belongsToMany(Demand::class)->withPivot('name','price','units');
    }
}
