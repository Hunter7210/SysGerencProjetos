@extends('layouts.app')

@section('content')
    <h1>Meus Projetos</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('projetos.create') }}" class="btn btn-primary">Criar Novo Projeto</a>

    @if ($projetos->isEmpty())
        <p>Você não tem nenhum projeto cadastrado.</p>
    @else
        <ul>
            @foreach ($projetos as $projeto)
                <li>

                    {{ $projeto->nomeProjeto }} - Termino: {{ $projeto->terminoProjeto }}
                    <a href="{{ route('projetos.inscricao', $projeto->id) }}">Solicitar entrada</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
