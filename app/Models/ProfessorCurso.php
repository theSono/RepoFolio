<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorCurso extends Model
{
    use HasFactory;
    protected $table = 'professor_curso';
    protected $fillable = ['professor_id', 'cursos_id'];

    public function professores(){
        return $this->belongsTo(Professor::class);
    }

    public function cursos(){
        return $this->belongsTo(Curso::class);
    }
}
