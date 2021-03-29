<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImagensProduto;

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
    public function ImagensProduto(){
        return $this->hasMany(ImagensProduto::class, 'id_produto');
    }
}
