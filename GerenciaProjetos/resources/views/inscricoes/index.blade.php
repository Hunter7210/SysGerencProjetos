@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Minhas Inscrições</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($inscricoes->isEmpty())
            <p>Você ainda não está inscrito em nenhum projeto.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Projeto</th>
                        <th>Descrição</th>
                        <th>Nome do Solicitante</th>
                        <th>Data da Inscrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscricoes as $inscricao)
                        <tr>
                            <td>{{ $inscricao->projeto->nomeProjeto }}</td>
                            <td>{{ $inscricao->descricaoSolicitacao }}</td>
                            <td>{{ $inscricao->nomeUsuSolit }}</td>
                            <td>{{ $inscricao->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <!-- Botão de Editar -->
                                <a href="{{ route('inscricoes.edit', $inscricao->id) }}"
                                    class="btn btn-warning btn-sm">Editar</a>

                                <!-- Formulário de Exclusão -->
                                <form action="{{ route('inscricoes.destroy', $inscricao->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir esta inscrição?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
