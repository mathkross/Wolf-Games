<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['PRODUTO_NOME','PRODUTO_DESC','PRODUTO_PRECO','PRODUTO_DESCONTO','CATEGORIA_ID','PRODUTO_ATIVO'];
    protected $table = 'PRODUTO';
    public function Categorias(){
        return $this->belongsTo(Categoria::class);
    }

}
