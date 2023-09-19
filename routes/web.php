<?php

use Illuminate\Support\Facades\Route;
// Importe os controladores necessários
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcademicosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\NiveisController;
use App\Http\Controllers\ProfessorCursoController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\UsuarioNivelController;




// Importe outras classes ou facades, se necessário
use Illuminate\Support\Facades\Auth; // Para autenticação

Route::get('/', function () {
    return view('public_view.contato');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'exibirViewPublica']);
Route::get('/equipe', [App\Http\Controllers\EquipeController::class, 'index'])->name('equipes');
Route::get('/equipe/create', [EquipeController::class, 'create'])->name('equipe.create');
Route::get('/equipe/{id}', [EquipeController::class, 'show'])->name('equipe.show');
Route::post('/equipe', [EquipeController::class, 'store']);
Route::patch('/equipe/{equipe_id}', [EquipeController::class, 'update']);
Route::delete('/equipe/{equipe_id}', [EquipeController::class, 'destroy']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/projetos', [App\Http\Controllers\ProjetosController::class, 'index'])->name('projetos');
Route::get('/projetos/create', [App\Http\Controllers\ProjetosController::class, 'create'])->name('projetos.create');
Route::get('/projetos/{id}', [ProjetosController::class, 'show'])->name('projetos.show');
Route::post('/projetos', [ProjetosController::class, 'store']);
Route::patch('/projetos/{projetos_id}', [ProjetosController::class, 'update']);
Route::delete('/projetos/{projetos_id}', [ProjetosController::class, 'destroy']);

Route::get('/academicos', [App\Http\Controllers\AcademicosController::class, 'index'])->name('academicos');
Route::get('/academicos/create', [App\Http\Controllers\AcademicosController::class, 'create'])->name('academicos.create');
Route::get('/academicos/{id}', [AcademicosController::class, 'show'])->name('academicos.show');
Route::post('/academicos', [AcademicosController::class, 'store']);
Route::patch('/academicos/{academicos_id}', [AcademicosController::class, 'update']);
Route::delete('/academicos/{academicos_id}', [AcademicosController::class, 'destroy']);

Route::get('/cursos', [App\Http\Controllers\CursosController::class, 'index'])->name('cursos');
Route::get('/cursos/create', [App\Http\Controllers\CursosController::class, 'create'])->name('cursos.create');
Route::get('/cursos/{id}', [CursosController::class, 'show'])->name('cursos.show');
Route::post('/cursos', [CursosController::class, 'store']);
Route::patch('/cursos/{curso_id}', [CursosController::class, 'update']);
Route::delete('/cursos/{curso_id}', [CursosController::class, 'destroy']);

Route::get('/niveis', [App\Http\Controllers\NiveisController::class, 'index'])->name('niveis');
Route::get('/niveis/create', [App\Http\Controllers\NiveisController::class, 'create'])->name('niveis.create');
Route::get('/niveis/{id}', [NiveisController::class, 'show'])->name('niveis.show');
Route::post('/niveis', [NiveisController::class, 'store']);
Route::patch('/niveis/{niveis_id}', [NiveisController::class, 'update']);
Route::delete('/niveis/{niveis_id}', [NiveisController::class, 'destroy']);

Route::get('/professores', [App\Http\Controllers\ProfessoresController::class, 'index'])->name('professores');
Route::get('/professores/create', [App\Http\Controllers\ProfessoresController::class, 'create'])->name('professores.create');
Route::get('/professores/{id}', [ProfessoresController::class, 'show'])->name('professores.show');
Route::post('/professores', [ProfessoresController::class, 'store']);
Route::patch('/professores/{professores_id}', [ProfessoresController::class, 'update']);
Route::delete('/professores/{professores_id}', [ProfessoresController::class, 'destroy']);

Route::get('/professor_curso', [App\Http\Controllers\ProfessorCursoController::class, 'index'])->name('professor_curso');
Route::get('/professor_curso/create', [App\Http\Controllers\ProfessorCursoController::class, 'create'])->name('professor_curso.create');
Route::get('/professor_curso/{id}', [ProfessorCursoController::class, 'show'])->name('professor_curso.show');
Route::post('/professor_curso', [ProfessorCursoController::class, 'store']);
Route::patch('/professor_curso/{professores_id}', [ProfessorCursoController::class, 'update']);
Route::delete('/professor_curso/{professores_id}', [ProfessorCursoController::class, 'destroy']);

Route::get('/usuario_nivel', [App\Http\Controllers\UsuarioNivelController::class, 'index'])->name('usuario_nivel');
Route::get('/usuario_nivel/create', [App\Http\Controllers\UsuarioNivelController::class, 'create'])->name('usuario_nivel.create');
Route::get('/usuario_nivel/{id}', [UsuarioNivelController::class, 'show'])->name('usuario_nivel.show');
Route::post('/usuario_nivel', [UsuarioNivelController::class, 'store']);
Route::patch('/usuario_nivel/{usuario_nivel_id}', [UsuarioNivelController::class, 'update']);
Route::delete('/usuario_nivel/{usuario_nivel_id}', [UsuarioNivelController::class, 'destroy']);



