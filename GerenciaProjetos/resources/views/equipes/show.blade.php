@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <!-- Imagem da Equipe -->
        {{--     <div class="col-md-6 mb-4 mb-md-0">
                <img src="/assets/img/img1.png" class="img-fluid rounded" alt="{{ $equipe->nomeEquipe }}">
            </div> --}}
            
            <!-- Informações da Equipe -->
            <div class="col-md-6">
                <h2 class="mb-3">{{ $equipe->nomeEquipe }}</h2>
                <p class="lead mb-2">Quantidade de Membros: {{ $equipe->qtdMembrosEquipe }}</p>
                <p class="text-muted">Criador da Equipe: {{ $equipe->usuCriadorEquipe }}</p>
            </div>
        </div>

        <hr class="my-4">

        <div class="d-flex justify-content-start mb-4">
            <a href="/projetos" class="btn btn-primary me-2">Ver Projetos Criados por Mim</a>
            
            <form action="{{ route('projetos.create', $equipe->id) }}" method="GET" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success">Criar Projeto</button>
            </form>
        </div>
    </div>
@endsection
