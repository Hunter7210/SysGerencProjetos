<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Criacao extends Model
{
    use Notifiable, HasFactory;
    protected $fillable = ['idEquipeFK', 'idUsuarioFK'];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
