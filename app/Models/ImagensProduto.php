<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagensProduto extends Model
{
    use HasFactory;  
    protected $fillable = [
        'id',
        'caminho_imagem_produto',
       'id_produto',
       'created_at'
    ];
}
