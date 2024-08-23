@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes da Inscrição</h1>

        <table class="table">
            <tr>
                <th>Nome do Projeto</th>
                <td>{{ $inscricao->projeto->nomeProjeto }}</td>
            </tr>
            <tr>
                <th>Descrição da Solicitação</th>
                <td>{{ $inscricao->descricaoSolicitacao }}</td>
            </tr>
            <tr>
                <th>Nome do Solicitante</th>
                <td>{{ $inscricao->nomeUsuSolit }}</td>
            </tr>
            <tr>
                <th>Data da Inscrição</th>
                <td>{{ $inscricao->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        </table>

        <a href="{{ route('inscricoes.edit', $inscricao->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('inscricoes.destroy', $inscricao->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    </div>
@endsection
