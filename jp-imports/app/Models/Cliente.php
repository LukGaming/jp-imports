<?php

namespace App\Models;

use App\Http\Controllers\TelefoneController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Telefone;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "nome",
        "email",
        "descricao_cliente",
        "facebook",        
        "instagram",       
        "itens_vendidos",
        "caminho_imagem_cliente"
    ];
    
}
