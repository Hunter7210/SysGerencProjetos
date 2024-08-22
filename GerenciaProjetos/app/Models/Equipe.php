<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Equipe extends Model
{
    use Notifiable, HasFactory;

    protected $fillable = ['nomeEquipe', 'qtdMembrosEquipe', 'usuCriadorEquipe'];

     // Relação de um para muitos com o modelo Usuario
     public function usuarios()
     {
         return $this->hasMany(Usuario::class, 'equipe_id');
     }
}
