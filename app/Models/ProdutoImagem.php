<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoImagem extends Model
{
    protected $fillable = ['imagem_ordem', 'produto_id', 'imagem_url'];
    protected $table = 'produto_imagem';
    use HasFactory;
}
