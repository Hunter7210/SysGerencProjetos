<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Execute the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nomeUsuario');
            $table->string('emailUsuario')->unique();
            $table->unsignedBigInteger('cargoUsuario'); // Alterado para chave estrangeira
            $table->string('nomeGerenteUsuario')->nullable();
            $table->string('nomeEmpresaUsuario')->nullable();   
            $table->unsignedBigInteger('equipe_id')->nullable(); // Relaciona o usuário a uma equipe
            $table->string('password');
            $table->timestamps();
            
            // Define a chave estrangeira
            $table->foreign('equipe_id')->references('id')->on('equipes')->onDelete('set null');
            $table->foreign('cargoUsuario')->references('id')->on('hierarquia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['cargoUsuario']); // Remove a chave estrangeira
        });

        Schema::dropIfExists('usuarios');
    }
}
