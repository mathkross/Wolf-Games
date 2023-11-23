<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoStatus extends Model
{
    protected $fillable = ['status_desc'];
    protected $table = 'pedido_status';
    use HasFactory;

    public function Pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
