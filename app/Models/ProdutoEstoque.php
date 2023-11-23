<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoEstoque extends Model
{
    protected $fillable = ['produto_id'];
    protected $table = 'produto_estoque';
    use HasFactory;

    public function Produtos()
    {
        return $this->belongsToMany(Produto::class)->withPivot('produto_id');
    }
}
