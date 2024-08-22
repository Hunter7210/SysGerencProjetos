@extends('layouts.app')

@section('content')
    <h1>Minhas Equipes</h1>

    @if(isset($equipes) && $equipes->isEmpty())
        <p>Você não está associado a nenhuma equipe.</p>
    @elseif(isset($equipes))
        <ul>
            @foreach($equipes as $equipe)
                <li>{{ $equipe->nomeEquipe }}</li>
                <li>{{ $equipe->qtdMembrosEquipe }} membros</li>
                <li>  <a href="{{ route('equipes.show', $equipe->id) }}" class="btn btn-primary">Ver Equipe</a></li>
            @endforeach
        </ul>
    @else
        <p>Erro ao carregar equipes.</p>
    @endif
@endsection 
