<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hierarquia extends Model
{
    protected $fillable = ['administrador','usuarioComum', 'gerente'];
    
}
