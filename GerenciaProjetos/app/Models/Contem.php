<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contem extends Model
{
    use Notifiable, HasFactory;

    protected $fillable = ['idEquipeFK', 'idProjetoFK'];

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}
