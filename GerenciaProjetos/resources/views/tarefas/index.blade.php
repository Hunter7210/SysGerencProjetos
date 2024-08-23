@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Lista de Tarefas</h1>

        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tarefas.create') }}" class="btn btn-primary mb-4">Criar Nova Tarefa</a>

        @if($tarefas->isEmpty())
            <p class="alert alert-info">Nenhuma tarefa encontrada.</p>
        @else
            <ul class="list-group">
                @foreach($tarefas as $tarefa)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h4 class="btn">{{ $tarefa->nomeTarefa }}</h4>

                        <div>
                            <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                            <a href="{{ route('tarefas.show', $tarefa->id) }}" class="btn btn-success btn-sm me-2">Ver Tarefa</a>

                            <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
