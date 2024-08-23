<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $fillable = ['idUsuarioFK', 'idProjetoFK', 'descricaoSolicitacao', 'nomeUsuSolit'];

      // Relacionamento com o modelo Usuario
      public function usuario()
      {
          return $this->belongsTo(Usuario::class, 'idUsuarioFK');
      }
  
      // Relacionamento com o modelo Projeto
      public function projeto()
      {
          return $this->belongsTo(Projeto::class, 'idProjetoFK');
      }
  
}
