<!-- resources/views/projetos/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $projeto->nomeProjeto }}</h1>

    <p><strong>Descrição:</strong> {{ $projeto->descricaoProjeto }}</p>
    <p><strong>Término:</strong> {{ $projeto->terminoProjeto }}</p>
    <p><strong>Responsáveis:</strong> {{ $projeto->responsaveisProjeto }}</p>

    <a href="{{ route('projetos.edit', $projeto->id) }}" class="btn btn-primary">Editar Projeto</a>

    <a href="{{ route('tarefas.index', $projeto->id) }}" class="btn btn-primary">Ver todas as tarefas</a>
    
    <a href="{{ route('tarefas.create', ['projetoId' => $projeto->id]) }}" class="btn btn-primary">Criar Tarefa</a>


    <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir Projeto</button>
    </form>
@endsection
