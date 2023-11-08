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

Route::resource('academico', AcademicosController::class);
Route::resource('curso', CursosController::class);
Route::resource('equipe', EquipeController::class);
Route::resource('nivel', NiveisController::class);
Route::resource('professor', ProfessoresController::class);
Route::resource('professorcurso', ProfessorCursoController::class);
Route::resource('usuarionivel', UsuarioNivelController::class);




