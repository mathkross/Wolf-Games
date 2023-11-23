<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinhoitem extends Model
{
    use HasFactory;
    protected $fillable = ['usuario_id', 'produto_id', 'item_qnt'];
    protected $table = 'carrinho_item';

    public function Produtos(){
        return $this->belongsTo(Produto::class);
    }

}
