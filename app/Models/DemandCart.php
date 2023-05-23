<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandCart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'demand_id', 'units'];

    public function Demand(){
        return $this->belongsTo(Demand::class);
    }

}