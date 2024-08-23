@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Cabeçalho do Projeto -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 class="display-4 mb-2">{{ $projeto->nomeProjeto }}</h1>
                <p class="lead"><strong>Descrição:</strong> {{ $projeto->descricaoProjeto }}</p>
            </div>
            <div class="col-md-4 text-md-end">
                <!-- Botões de Ação -->
                <a href="{{ route('projetos.edit', $projeto->id) }}" class="btn btn-primary mb-2">
                    <i class="bi bi-pencil"></i> Editar Projeto
                </a>
                <a href="{{ route('tarefas.index', $projeto->id) }}" class="btn btn-secondary mb-2">
                    <i class="bi bi-list-ul"></i> Ver Todas as Tarefas
                </a>
                <a href="{{ route('tarefas.create', ['projetoId' => $projeto->id]) }}" class="btn btn-success mb-2">
                    <i class="bi bi-plus"></i> Criar Tarefa
                </a>
                <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Excluir Projeto
                    </button>
                </form>
            </div>
        </div>

        <!-- Detalhes do Projeto -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Término</h5>
                        <p class="card-text">{{ $projeto->terminoProjeto }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Responsáveis</h5>
                        <p class="card-text">{{ $projeto->responsaveisProjeto }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
