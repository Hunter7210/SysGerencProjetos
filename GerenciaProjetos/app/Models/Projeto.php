<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projetos'; // Nome da tabela

    public $incrementing = true; // Chave primária é auto-incrementável

    protected $fillable = [
        'nomeProjeto',
        'descricaoProjeto',
        'terminoProjeto',
        'responsaveisProjeto',
        'criadorProjetoFk',
        'equipeProjetoFk',
    ];

    // Relação com o modelo Usuario
    public function criador()
    {
        return $this->belongsTo(Usuario::class, 'criadorProjetoFk', 'id');
    }

    // Relação com o modelo Equipe
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'equipeProjetoFk', 'id');
    }
}
