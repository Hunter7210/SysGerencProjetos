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

// Página específica para usuários
Route::get('/homeComum', [HomeController::class, 'homeCom'])->name('usuarios.homeCom');

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



/* 
Route::get('/inscricoes/create/{projeto}', [InscricaoController::class, 'create'])->name('inscricoes.create');

Route::post('/inscricoes', [InscricaoController::class, 'store'])->name('inscricoes.store');

Route::get('/inscricoes', [InscricaoController::class, 'index'])->name('inscricoes.index');


 */
//Exibindo as Inscrições

// Rota para exibir a lista de inscrições
Route::get('/inscricoes', [InscricaoController::class, 'index'])->name('inscricoes.index');

// Rota para exibir o formulário de criação de uma nova inscrição
Route::get('/inscricoes/create/{projeto}', [InscricaoController::class, 'create'])->name('inscricoes.create');

// Rota para armazenar uma nova inscrição
Route::post('/inscricoes', [InscricaoController::class, 'store'])->name('inscricoes.store');

// Rota para exibir os detalhes de uma inscrição específica
Route::get('/inscricoes/{inscricao}', [InscricaoController::class, 'show'])->name('inscricoes.show');

// Rota para exibir o formulário de edição de uma inscrição específica
Route::get('/inscricoes/{inscricao}/edit', [InscricaoController::class, 'edit'])->name('inscricoes.edit');

// Rota para atualizar uma inscrição específica
Route::put('/inscricoes/{inscricao}', [InscricaoController::class, 'update'])->name('inscricoes.update');

// Rota para deletar uma inscrição específica
Route::delete('/inscricoes/{inscricao}', [InscricaoController::class, 'destroy'])->name('inscricoes.destroy');

Route::resource('projetos', ProjetosController::class);
/*
Route::get('/tarefas/create/{projetoId}', [TarefasController::class, 'create'])->name('tarefas.create');
 */
Route::resource('tarefas', TarefasController::class);



/* Rotas para projetos */

// Exibir uma lista de projetos
Route::get('/projetos', [ProjetosController::class, 'index'])->name('projetos.index');

// Exibir o formulário para criar um novo projeto
Route::get('/projetos/create/{equipe}', [ProjetosController::class, 'create'])->name('projetos.create');

// Processar o formulário para salvar um novo projeto
Route::post('/projetos', [ProjetosController::class, 'store'])->name('projetos.store');

// Exibir um projeto específico
Route::get('/projetos/{projeto}', [ProjetosController::class, 'show'])->name('projetos.show');

// Exibir o formulário para editar um projeto existente
Route::get('/projetos/{projeto}/edit', [ProjetosController::class, 'edit'])->name('projetos.edit');

// Processar o formulário para atualizar um projeto existente
Route::put('/projetos/{projeto}', [ProjetosController::class, 'update'])->name('projetos.update');

// Deletar um projeto específico
Route::delete('/projetos/{projeto}', [ProjetosController::class, 'destroy'])->name('projetos.destroy');



// Rota para marcar a tarefa como concluída
Route::patch('/tarefas/{id}/concluir', [TarefasController::class, 'markAsCompleted'])->name('tarefas.concluir');
