<?php

use App\Http\Controllers\HomeController;
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
