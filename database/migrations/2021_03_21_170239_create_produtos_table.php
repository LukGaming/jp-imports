<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->longText("descricao")->nullable();
            $table->string("valor")->nullable();
            $table->integer("vendido")->nullable()->default('0');
            $table->date("horario_compra");
            $table->integer("dropship")->default('0');
            $table->integer("usuario_criador_produto");
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
        Schema::dropIfExists('produtos');
    }
}
