<!-- resources/views/tarefas/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $tarefa->nomeTarefa }}</h1>
    <p>Prazo: {{ $tarefa->prazoTarefa }}</p>
    <p>Descrição: {{ $tarefa->descricaoTarefa }}</p>
    <p>Atribuição: {{ $tarefa->atribuicaoTarefa }}</p>

    <a href="{{ route('tarefas.edit', $tarefa->id) }}">Editar</a>
    
    <!-- Botão para marcar como concluída -->
    <form action="{{ route('tarefas.concluir', $tarefa->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-success" value="true">Marcar como Concluída</button>
    </form>

    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    
    <a href="{{ route('tarefas.index') }}">Voltar para a lista</a>
@endsection
