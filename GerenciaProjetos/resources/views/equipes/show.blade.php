@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="/assets/img/img1.png" class="img-fluid" alt="{{ $equipe->nomeEquipe }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $equipe->nomeEquipe}}</h2>
                <h2>{{ $equipe->qtdMembrosEquipe}}</h2>
                <p>{{ $equipe->usuCriadorEquipe }}</p>

            </div>
        </div>
        <hr>
        <a href="/projetos" type="submit" class="login">Ver Projetos Criados por mim</a>
        <hr>{{-- 
        <a href="/projetos/create" type="submit" class="login">Criar Projetos</a> --}}
        <div class="projetos-view">

            
    <form action="{{ route('projetos.create', $equipe->id) }}" method="GET" style="display:inline;">
        @csrf
        <button type="submit" class="login">Criar Projetos</button>
    </form>

        </div>
    </div>
@endsection