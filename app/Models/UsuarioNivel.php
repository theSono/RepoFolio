<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioNivel extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'niveis_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function niveis(){
        return $this->belongsTo(Nivel::class);
    }
}
