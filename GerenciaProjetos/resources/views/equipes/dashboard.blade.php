@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @php
            $user = Auth::user();
        @endphp

        @if ($user->isGerente())
            
            <div class="container">
                <h1 class="my-4">Minhas Equipes</h1>

                @if (isset($equipes) && $equipes->isEmpty())
                    <div class="alert alert-info" role="alert">
                        Você não está associado a nenhuma equipe.
                    </div>
                @elseif(isset($equipes))
                    <div class="row">
                        @foreach ($equipes as $equipe)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $equipe->nomeEquipe }}</h5>
                                        <p class="card-text">Quantidade de Membros: {{ $equipe->qtdMembrosEquipe }}</p>
                                        <a href="{{ route('equipes.show', $equipe->id) }}" class="btn btn-primary">Ver
                                            Equipe</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        Erro ao carregar equipes.
                    </div>
                @endif
            </div>
        @else
            <div class="container">
                <h1 class="my-4">Meus Projetos</h1>

                @if (isset($projetos) && $projetos->isEmpty())
                    <div class="alert alert-info" role="alert">
                        Você não está associado a nenhum projeto.
                    </div>
                @elseif(isset($projetos))
                    <div class="row">
                        @foreach ($projetos as $projeto)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm border-primary">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $projeto->nomeProjeto }}</h5>
                                        <p class="card-text">{{ $projeto->descricaoProjeto }}</p>
                                        <a href="{{ route('projetos.show', $projeto->id) }}" class="btn btn-primary">Ver
                                            Projeto</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        Erro ao carregar projetos.
                    </div>
                @endif
            </div>
        @endif
    @else
        <div class="container">
            <div class="alert alert-warning" role="alert">
                Para acessar esta página é necessário login.
            </div>
        </div>
    @endif
@endsection
