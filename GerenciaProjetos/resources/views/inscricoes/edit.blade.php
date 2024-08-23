@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Inscrição</h1>

        <form action="{{ route('inscricoes.update', $inscricao->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="idProjetoFK">Projeto:</label>
                <select name="idProjetoFK" id="idProjetoFK" class="form-control">
                    @foreach ($projetos as $projeto)
                        <option value="{{ $projeto->id }}" {{ $inscricao->idProjetoFK == $projeto->id ? 'selected' : '' }}>
                            {{ $projeto->nomeProjeto }}
                        </option>
                    @endforeach
                </select>
                @error('idProjetoFK')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nomeUsu">Seu Nome:</label>
                <input type="text" name="nomeUsu" id="nomeUsu" class="form-control" value="{{ old('nomeUsu', $inscricao->nomeUsuSolit) }}">
                @error('nomeUsu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descricaoSolicitacao">Descrição da Solicitação:</label>
                <textarea name="descricaoSolicitacao" id="descricaoSolicitacao" class="form-control">{{ old('descricaoSolicitacao', $inscricao->descricaoSolicitacao) }}</textarea>
                @error('descricaoSolicitacao')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
