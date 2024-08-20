@extends('layouts.app')
@section('content') 


    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form action="{{ route( 'usuario.cadastro' ) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" id="cargo" name="cargo" required>
            </div>
            <div class="form-group">
                <label for="nomeEmpresa">Nome da Empresa:</label>
                <input type="text" id="nomeEmpresa" name="nomeEmpresa" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>


    