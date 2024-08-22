<!-- resources/views/projetos/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editar Projeto: {{ $projeto->nomeProjeto }}</h1>

    <form action="{{ route('projetos.update', $projeto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomeProjeto">Nome do Projeto:</label>
            <input type="text" name="nomeProjeto" class="form-control" value="{{ $projeto->nomeProjeto }}" required>
        </div>

        <div class="form-group">
            <label for="descricaoProjeto">Descrição do Projeto:</label>
            <input type="text" name="descricaoProjeto" class="form-control" value="{{ $projeto->descricaoProjeto }}" required>
        </div>

        <div class="form-group">
            <label for="terminoProjeto">Término do Projeto:</label>
            <input type="date" name="terminoProjeto" class="form-control" value="{{ $projeto->terminoProjeto }}">
        </div>

        <div class="form-group">
            <label for="responsaveisProjeto">Responsáveis:</label>
            <input type="text" name="responsaveisProjeto" class="form-control" value="{{ $projeto->responsaveisProjeto }}" required>
        </div>

        <div class="form-group">
            <label for="equipeProjetoFk">Equipe:</label>
            <input type="number" name="equipeProjetoFk" class="form-control" value="{{ $projeto->equipeProjetoFk }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Projeto</button>
    </form>
@endsection
