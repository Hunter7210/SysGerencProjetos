<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'nomeUsuario',
        'emailUsuario',
        'cargoUsuario',
        'nomeGerenteUsuario',
        'nomeEmpresaUsuario',
        'password'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function incriscoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    public function hierarquia()
    {
        return $this->belongsTo(Hierarquia::class, 'cargoUsuario');
    }
}
