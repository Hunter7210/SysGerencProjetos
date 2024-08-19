<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTable extends Migration
{
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nomeProjeto'); // VARCHAR(255)
            $table->string('descricaoProjeto'); // VARCHAR(255)
            $table->dateTime('terminoProjeto')->nullable(); // DATETIME, nullable se não for obrigatório
            $table->string('responsaveisProjeto'); // VARCHAR(255)
            $table->unsignedBigInteger('criadorProjetoFk'); // FOREIGN KEY Usuario
            $table->unsignedBigInteger('equipeProjetoFk'); // FOREIGN KEY equipe
            $table->timestamps(); // horaCriado (created_at, updated_at)

            // Definindo as chaves estrangeiras
            $table->foreign('criadorProjetoFk')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('equipeProjetoFk')->references('id')->on('equipes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
