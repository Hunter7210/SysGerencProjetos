<!-- resources/views/inscricoes/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastro de Inscrição</h1>

    <!-- Exibe mensagens de sucesso -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('inscricoes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="idUsuarioFK">Usuário</label>
            <select name="idUsuarioFK" id="idUsuarioFK" class="form-control">
                <option value="">Selecione um usuário</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                @endforeach
            </select>
            @error('idUsuarioFK')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="idProjetoFK">Projeto</label>
            <select name="idProjetoFK" id="idProjetoFK" class="form-control">
                <option value="">Selecione um projeto</option>
                @foreach($projetos as $projeto)
                    <option value="{{ $projeto->id }}">{{ $projeto->nome }}</option>
                @endforeach
            </select>
            @error('idProjetoFK')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
