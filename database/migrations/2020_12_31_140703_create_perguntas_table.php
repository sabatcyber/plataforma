<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contrato');
            $table->string('nome_aluno');
            $table->string('perfil');
            $table->string('pergunta_01');
            $table->string('pergunta_02');
            $table->string('pergunta_03');
            $table->string('pergunta_04');
            $table->string('pergunta_05');
            $table->string('pergunta_06');
            $table->string('pergunta_07');
            $table->string('pergunta_08');
            $table->string('pergunta_09');
            $table->string('pergunta_10');
            $table->string('pergunta_11');
            $table->string('pergunta_12');
            $table->string('pergunta_13');
            $table->string('pergunta_14');
            $table->string('pergunta_15');
            $table->string('pergunta_16');
            $table->string('pergunta_17');
            $table->string('pergunta_18');
            $table->string('pergunta_19');
            $table->string('pergunta_20');
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
        Schema::dropIfExists('perguntas');
    }
}
