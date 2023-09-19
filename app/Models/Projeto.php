<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'orgaos_proponentes', 'participantes', 'dimensao', 'periodo_duracao', 'coordenacao_orientacao', 'participantes', 'resumo_projeto', 'justificativa', 'fundamentacao_teorica', 'objetivos_geral', 'objetivos_especificos', 'metodologia', 'recursos_orçamentos', 'anexos'];
}
