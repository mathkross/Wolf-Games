<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidoitem extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'pedido_id', 'item_qtd', 'item_preco'];
    protected $table = 'pedido_item';


    public function Produtos()
    {
        return $this->belongsToMany(Produto::class)->withPivot('produto_nome', 'produto_preco', 'produto_desc');
    }
}
