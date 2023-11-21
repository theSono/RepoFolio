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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/projeto', [ProjetosController::class, 'listar']);
Route::get('/projeto/create', [ProjetosController::class, 'create'])->name('projeto.create');
Route::get('/projeto/report', [ProjetosController::class, 'showReport']);
Route::get('/projeto/{projeto_id}', [ProjetosController::class, 'show'])->name('projeto.show');
Route::post('/projeto', [ProjetosController::class, 'store']);
Route::patch('/projeto/{projeto_id}', [ProjetosController::class, 'update']);
Route::delete('/projeto/{projeto_id}', [ProjetosController::class, 'deletar']);

//Route::get('/equipe', [EquipeController::class, 'index']);
//Route::get('/equipe/create', [EquipeController::class, 'create'])->name('equipe.create');
//Route::get('/equipe/report', [EquipeController::class, 'showReport']);
//Route::get('/equipe/{equipe_id}', [EquipeController::class, 'show'])->name('equipe.show');
//Route::post('/equipe', [EquipeController::class, 'store']);
//Route::patch('/equipe/{equipe_id}', [EquipeController::class, 'update']);
//Route::delete('/equipe/{equipe_id}', [EquipeController::class, 'deletar']);

Route::resource('equipe', EquipeController::class);
Route::resource('academicos', AcademicosController::class);
Route::resource('cursos', CursosController::class);
Route::resource('equipe', EquipeController::class);
Route::resource('niveis', NiveisController::class);
Route::resource('professores', ProfessoresController::class);
Route::resource('professor_curso', ProfessorCursoController::class);
Route::resource('user', ProfessorCursoController::class);
Route::resource('usuarionivel', UsuarioNivelController::class);

Route::get('contatos',[ContatosController::class, 'index']);

Route::post('contatos',[ContatosController::class, 'enviar']);




