<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $fillable = ['idUsuarioFK', 'idProjetoFK'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}
