<?php
/* 
        'nomeGerenteUsuario',
        'nomeEmpresaUsuario', */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'nomeUsuario',
        'emailUsuario',
        'cargoUsuario',
        'password',
        'equipe_id'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function incricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    public function hierarquia()
    {
        return $this->belongsTo(Hierarquia::class, 'cargoUsuario');
    }

    public function isUser()
    {
        return $this->cargoUsuario === 1;
    }

    public function isGerente()
    {

        return $this->cargoUsuario === 2;
    }

    // Relação com o modelo Equipe (um usuário pertence a uma equipe)
    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'equipe_id');
    }

}
