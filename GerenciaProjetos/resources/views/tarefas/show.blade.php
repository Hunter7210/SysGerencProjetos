@extends('layouts.app')

@section('content')
    <h1>{{ $tarefa->nomeTarefa }}</h1>
    <p>Prazo: {{ $tarefa->prazoTarefa }}</p>
    <p>Descrição: {{ $tarefa->descricaoTarefa }}</p>
    <p>Atribuição: {{ $tarefa->atribuicaoTarefa }}</p>

    <a href="{{ route('tarefas.edit', $tarefa->id) }}">Editar</a>
    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>
    <a href="{{ route('tarefas.index') }}">Voltar para a lista</a>
@endsection