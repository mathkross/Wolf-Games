<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['usuario_id', 'endereco_nome', 'endereco_logradouro', 'endereco_numero', 'endereco_complemento', 'endereco_complemento', 'endereco_cep', 'endereco_cidade', 'endereco_estado'];
    use HasFactory;
}
