@extends('layouts.app')

@section('content')

    <h1>Criar Tarefa</h1>

    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf
        <label for="nomeTarefa">Nome:</label>
        <input type="text" id="nomeTarefa" name="nomeTarefa" required>

        <label for="prazoTarefa">Prazo:</label>
        <input type="date" id="prazoTarefa" name="prazoTarefa" required>

        <label for="descricaoTarefa">Descrição:</label>
        <textarea id="descricaoTarefa" name="descricaoTarefa"></textarea>

        <label for="atribuicaoTarefa">Atribuição:</label>
        <input type="text" id="atribuicaoTarefa" name="atribuicaoTarefa" required>

        {{-- <label for="atribuicaoTarefa">Atribuir Tarefa a:</label>
        <select name="atribuicaoTarefa" id="atribuicaoTarefa" class="form-control">
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nomeUsuario }}</option>
            @endforeach
        </select> --}}
        <button type="submit">Salvar</button>
    </form>
    @endsection