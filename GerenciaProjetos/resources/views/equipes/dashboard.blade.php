@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @php
            $user = Auth::user();
        @endphp

        @if ($user->isGerente())
            <h1>Minhas Equipes</h1>

            @if (isset($equipes) && $equipes->isEmpty())
                <p>Você não está associado a nenhuma equipe.</p>
            @elseif(isset($equipes))
                <ul>
                    @foreach ($equipes as $equipe)
                        <li>{{ $equipe->nomeEquipe }}</li>
                        <li>{{ $equipe->qtdMembrosEquipe }} membros</li>
                        <li> <a href="{{ route('equipes.show', $equipe->id) }}" class="btn btn-primary">Ver Equipe</a></li>
                    @endforeach
                </ul>
            @else
                <p>Erro ao carregar equipes.</p>
            @endif
        @else
            <p>Para começar entre em algum projeto</p>
            <li> <a href="{{ route('inscricoes') }}" class="btn btn-primary">Ver Projetos</a></li>
        @endif
    @else
        <p>Para acessar esta pagina é necessário login</p>
    @endif
@endsection
