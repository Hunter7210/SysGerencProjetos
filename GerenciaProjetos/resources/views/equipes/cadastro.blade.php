@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cadastro de Equipe</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('equipes.cadastro') }}">
        @csrf

        <!-- Nome da Equipe -->
        <div class="form-group">
            <label for="nomeEquipe">Nome da Equipe</label>
            <input id="nomeEquipe" type="text" class="form-control @error('nomeEquipe') is-invalid @enderror" name="nomeEquipe" value="{{ old('nomeEquipe') }}" required>
            @error('nomeEquipe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Quantidade de Membros da Equipe -->
        <div class="form-group">
            <label for="qtdMembrosEquipe">Quantidade de Membros</label>
            <input id="qtdMembrosEquipe" type="number" class="form-control @error('qtdMembrosEquipe') is-invalid @enderror" name="qtdMembrosEquipe" value="{{ old('qtdMembrosEquipe') }}" required min="1">
            @error('qtdMembrosEquipe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Botão de Cadastro -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Cadastrar Equipe
            </button>
        </div>
    </form>
</div>
@endsection
