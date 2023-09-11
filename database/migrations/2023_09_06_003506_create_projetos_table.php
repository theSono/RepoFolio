<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTable extends Migration
{
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('orgaos_proponentes');
            $table->string('participantes')->nullable();
            $table->string('dimensao')->nullable();
            $table->string('periodo_duracao')->nullable();
            $table->string('coordenacao_orientacao')->nullable();
            $table->text('resumo_projeto')->nullable();
            $table->text('justificativa')->nullable();
            $table->text('fundamentacao_teorica')->nullable();
            $table->text('objetivos_geral')->nullable();
            $table->text('objetivos_especificos')->nullable();
            $table->text('metodologia')->nullable();
            $table->text('recursos_orçamentos')->nullable();
            $table->text('anexos')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}

