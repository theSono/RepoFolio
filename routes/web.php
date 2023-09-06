<?php

use Illuminate\Support\Facades\Route;
// Importe os controladores necessários
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\NivelController;

// Importe outras classes ou facades, se necessário
use Illuminate\Support\Facades\Auth; // Para autenticação

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


