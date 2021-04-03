<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotasClientes extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "body",
        "id_cliente",
        "created_at",
        "id_usuario",
    ];
}
