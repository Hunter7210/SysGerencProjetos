<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tarefa extends Model
{
    use Notifiable, HasFactory;
    protected $fillable = ['nomeTarefa', 'prazoTarefa', 'descricaoTarefa', 'atribuicaoTarefa'];

    // Relação com o modelo Usuario
    public function criador()
    {
        return $this->belongsTo(Usuario::class, 'atribuicaoTarefa');
    }
}
