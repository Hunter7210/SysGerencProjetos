<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Hierarquia extends Model
{
    use Notifiable,HasFactory;
    protected $fillable = ['cargo'];

    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }
}
