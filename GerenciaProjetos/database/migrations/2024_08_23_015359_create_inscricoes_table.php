<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('idUsuarioFK')->constrained('usuarios')->onDelete('cascade'); // Foreign key para usuarios
            $table->foreignId('idProjetoFK')->constrained('projetos')->onDelete('cascade'); // Foreign key para projetos
            $table->string('descricaoSolicitacao')->nullable();
            $table->string('nomeUsuSolit')->nullable();
            $table->timestamps(); // Campos created_at e updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricoes');
    }
};
