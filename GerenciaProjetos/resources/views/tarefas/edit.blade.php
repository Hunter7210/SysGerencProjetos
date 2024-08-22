@extends('layouts.app')

@section('content')
    <h1>Editar Tarefa</h1>

    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nomeTarefa">Nome:</label>
        <input type="text" id="nomeTarefa" name="nomeTarefa" value="{{ $tarefa->nomeTarefa }}" required>

        <label for="prazoTarefa">Prazo:</label>
        <input type="date" id="prazoTarefa" name="prazoTarefa" value="{{ $tarefa->prazoTarefa }}" required>

        <label for="descricaoTarefa">Descrição:</label>
        <textarea id="descricaoTarefa" name="descricaoTarefa">{{ $tarefa->descricaoTarefa }}</textarea>

        <label for="atribuicaoTarefa">Atribuição:</label>
        <input type="text" id="atribuicaoTarefa" name="atribuicaoTarefa" value="{{ $tarefa->atribuicaoTarefa }}"
            required>

        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('tarefas.index') }}">Voltar para a lista</a>
    @endsection