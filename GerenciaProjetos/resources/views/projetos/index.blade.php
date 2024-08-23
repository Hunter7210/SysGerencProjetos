@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (Auth::check())
        @php
            $user = Auth::user();
        @endphp
        <H1>Eu sou o {{ $user->cargoUsuario }}</H1>

        @if ($user->isGerente())
            <h1>Meus Projetos</h1>
            @if ($projetos->isEmpty())
                <p>Você não tem nenhum projeto cadastrado.</p>
            @else
                {{--     <a href="{{ route('projetos.create', $equipe->id) }}" class="btn btn-primary">Criar Novo Projeto</a> --}}
                <ul>
                    @foreach ($projetos as $projeto)
                        <li>

                            {{ $projeto->nomeProjeto }} - Termino: {{ $projeto->terminoProjeto }}
                            <a href="{{ route('projetos.show', $projeto->id) }}">Ver projeto</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @else
            @if ($projetos->isEmpty())
                <p>No momento não há nenhum projeto cadastrado. Aguarde ou contate um ADM</p>
            @else
                <h1>Projetos</h1>
                <ul>
                    @foreach ($projetos as $projeto)
                        <li>

                            {{ $projeto->nomeProjeto }} - Termino: {{ $projeto->terminoProjeto }}
                            <a href="{{ route('inscricoes.create', $projeto->id) }}">Solicitar entrada</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
    @endif
@endsection
