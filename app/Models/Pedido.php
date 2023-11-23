<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['usuario_id', 'endereco_id', 'status_id','pedido_data'];


    public function PedidosItens()
    {
        return $this->belongsToMany(PedidoItem::class)->withPivot('pedido_item');
    }
}
