<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("email")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->longText("descricao_cliente")->nullable();
            $table->integer("itens_vendidos")->default(0);
            $table->string("caminho_imagem_cliente")->nullable();            
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
