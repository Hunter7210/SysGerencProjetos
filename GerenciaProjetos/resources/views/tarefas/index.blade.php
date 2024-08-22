@extends('layouts.app')

@section('content')
    <h1>Lista de Tarefas</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('tarefas.create') }}">Criar Nova Tarefa</a>

    <ul>
        @foreach($tarefas as $tarefa)
            <li>
                <a href="{{ route('tarefas.show', $tarefa->id) }}">{{ $tarefa->nomeTarefa }}</a>
                <a href="{{ route('tarefas.edit', $tarefa->id) }}">Editar</a>
                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
    @endsection 