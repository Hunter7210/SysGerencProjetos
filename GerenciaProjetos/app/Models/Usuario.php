<?php
/* 
        'nomeGerenteUsuario',
        'nomeEmpresaUsuario', */
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
        'password'
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
}
