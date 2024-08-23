@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Editar Tarefa</h1>

        <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nomeTarefa" class="form-label">Nome:</label>
                <input type="text" id="nomeTarefa" name="nomeTarefa" class="form-control" value="{{ $tarefa->nomeTarefa }}" required>
            </div>

            <div class="mb-3">
                <label for="prazoTarefa" class="form-label">Prazo:</label>
                <input type="date" id="prazoTarefa" name="prazoTarefa" class="form-control" value="{{ $tarefa->prazoTarefa }}" required>
            </div>

            <div class="mb-3">
                <label for="descricaoTarefa" class="form-label">Descrição:</label>
                <textarea id="descricaoTarefa" name="descricaoTarefa" class="form-control" rows="4" required>{{ $tarefa->descricaoTarefa }}</textarea>
            </div>

            <div class="mb-3">
                <label for="atribuicaoTarefa" class="form-label">Atribuição:</label>
                <input type="text" id="atribuicaoTarefa" name="atribuicaoTarefa" class="form-control" value="{{ $tarefa->atribuicaoTarefa }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Voltar para a lista</a>
            </div>
        </form>
    </div>
@endsection
