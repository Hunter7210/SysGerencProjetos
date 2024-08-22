
@extends('layouts.app')

@section('content')
    <h1>Meus Projetos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('projetos.create') }}" class="btn btn-primary">Criar Novo Projeto</a>

    @if($projetos->isEmpty())
        <p>Você não tem nenhum projeto cadastrado.</p>
    @else
        <ul>
            @foreach($projetos as $projeto)
                <li>
                    <a href="{{ route('projetos.show', $projeto->id) }}">
                        {{ $projeto->nomeProjeto }} - Termino: {{ $projeto->terminoProjeto }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection