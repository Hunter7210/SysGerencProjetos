@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastro de Inscrição</h1>

        <!-- Exibe mensagens de sucesso -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('inscricoes.store') }}" method="POST">
            @csrf

            <!-- Campo oculto para armazenar o ID do projeto -->
            <input type="hidden" name="idProjetoFK" value="{{ isset($projeto) ? $projeto->id : '' }}">

            <div class="form-group">
                <label for="nomeUsu">Nome Completo:</label>
                <input type="text" name="nomeUsu" id="nomeUsu" placeholder="Digite seu nome completo" class="form-control" value="{{ old('nomeUsu') }}">
                @error('nomeUsu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descricaoSolicitacao">Descrição da Solicitação:</label>
                <textarea name="descricaoSolicitacao" id="descricaoSolicitacao" class="form-control" placeholder="Digite aqui o motivo pelo qual gostaria de entrar neste projeto">{{ old('descricaoSolicitacao') }}</textarea>
                @error('descricaoSolicitacao')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
@endsection
