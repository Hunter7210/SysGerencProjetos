@extends('layouts.app')
@section('content') 


    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form action="{{ route('usuarios.cadastro') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nomeUsuario">Nome:</label>
        <input type="text" id="nomeUsuario" name="nomeUsuario" required>
    </div>
    <div class="form-group">
        <label for="emailUsuario">E-mail:</label>
        <input type="email" id="emailUsuario" name="emailUsuario" required>
    </div>
    <div class="form-group">
        <label for="cargoUsuario">Cargo:</label>
        <input type="text" id="cargoUsuario" name="cargoUsuario" required>
    </div>
    <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirme a Senha:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <div class="form-group">
        <button type="submit">Cadastrar</button>
    </div>
</form>

        </form>
    </div>

    @endsection


    