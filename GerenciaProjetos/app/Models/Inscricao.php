<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $fillable = ['', 'vaga_id', 'status'];
    
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

}
