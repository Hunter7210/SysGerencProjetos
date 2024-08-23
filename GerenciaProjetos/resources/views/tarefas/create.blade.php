@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Criar Tarefa</h1>

        <form action="{{ route('tarefas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nomeTarefa" class="form-label">Nome:</label>
                <input type="text" id="nomeTarefa" name="nomeTarefa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prazoTarefa" class="form-label">Prazo:</label>
                <input type="date" id="prazoTarefa" name="prazoTarefa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descricaoTarefa" class="form-label">Descrição:</label>
                <textarea id="descricaoTarefa" name="descricaoTarefa" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="atribuicaoTarefa" class="form-label">Atribuir Tarefa a:</label>
                <select name="atribuicaoTarefa" id="atribuicaoTarefa" class="form-control">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->emailUsuario }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
