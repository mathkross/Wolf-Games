<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['produto_nome','produto_desc','produto_preco','produto_desconto','categoria_id','produto_ativo'];

    public function Categorias(){
        return $this->belongsTo(Categoria::class);
    }

}
