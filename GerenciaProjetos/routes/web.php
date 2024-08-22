<?php

use App\Http\Controllers\EquipeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\ProjetosController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

// Rota para a pagina principal
Route::get('/', [HomeController::class, 'index'])->name('home');


/* // Rota para a pagina de cadastrar-se/registrar-se
Route::get('/cadastro', function () {
    return view('usuario.cadastro');
}); */

// Rota para exibir o formulário de login
Route::get('/login', [UsuariosController::class, 'showLoginForm'])->name('usuarios.login.form');

// Rota para processar o login
Route::post('/login', [UsuariosController::class, 'login'])->name('usuarios.login');

// Rota para exibir o formulário de registro
Route::get('/cadastro', [UsuariosController::class, 'showRegistroForm'])->name('usuarios.cadastro.form');

// Rota para processar o registro
Route::post('/cadastro', [UsuariosController::class, 'cadastro'])->name('usuarios.cadastro');

// Rota para logout
Route::post('/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');
/* 
Route::post('/dashboardUsu', [UsuariosController::class, 'logout'])->name('usuarios.logout'); */

Route::get('/equipe/cadastro', [EquipeController::class, 'cadastroForm'])->name('equipes.cadastro');

Route::post('/equipe/cadastro', [EquipeController::class, 'cadastro'])->name('equipes.cadastro.form');

Route::get('/equipes', [EquipeController::class, 'index'])->name('equipes.dashboard');

Route::get('equipe/{equipe}', [EquipeController::class, 'show'])->middleware('auth')->name('equipes.show');




Route::get('/inscricoes/create', [InscricaoController::class, 'create'])->name('inscricoes.create');
Route::post('/inscricoes', [InscricaoController::class, 'store'])->name('inscricoes.store');


Route::resource('projetos', ProjetosController::class);
/*
Route::get('/tarefas/create/{projetoId}', [TarefasController::class, 'create'])->name('tarefas.create');
 */
Route::resource('tarefas', TarefasController::class);
