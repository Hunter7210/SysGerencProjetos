@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Mensagem de Sucesso -->
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (Auth::check())
            @php
                $user = Auth::user();
            @endphp

        {{--     <h1 class="mb-4">Eu sou o {{ $user->cargoUsuario }}</h1>
 --}}
            @if ($user->isGerente())
                <h2 class="mb-3">Meus Projetos</h2>

                @if ($projetos->isEmpty())
                    <div class="alert alert-info">
                        Você não tem nenhum projeto cadastrado.
                    </div>
                @else
                    <div class="mb-4">
                        {{-- <a href="{{ route('projetos.create', $equipe->id) }}" class="btn btn-primary">Criar Novo Projeto</a> --}}
                    </div>
                    <ul class="list-group">
                        @foreach ($projetos as $projeto)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $projeto->nomeProjeto }} - Termino: {{ $projeto->terminoProjeto }}
                                <a href="{{ route('projetos.show', $projeto->id) }}" class="btn btn-primary">Ver Projeto</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            @else
                <h2 class="mb-3">Projetos</h2>

                @if ($projetos->isEmpty())
                    <div class="alert alert-info">
                        No momento não há nenhum projeto cadastrado. Aguarde ou contate um ADM.
                    </div>
                    <a href="{{ route('projetos.index') }}" class="btn btn-primary">Ver Projetos</a>

                @else
                    <ul class="list-group">
                        @foreach ($projetos as $projeto)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $projeto->nomeProjeto }} - Termino: {{ $projeto->terminoProjeto }}
                                <a href="{{ route('inscricoes.create', $projeto->id) }}" class="btn btn-link">Solicitar
                                    Entrada</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            @endif
        @else
            <div class="alert alert-warning">
                Para acessar suas informações, faça o login.
            </div>
        @endif
    </div>
@endsection
