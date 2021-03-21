<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        "nome",
        "descricao",
        "valor",
        "vendido",
        "horario_compra",
        "horario_criacao_produto",
        "dropship",
        "usuario_criador_produto"
    ];  
}
