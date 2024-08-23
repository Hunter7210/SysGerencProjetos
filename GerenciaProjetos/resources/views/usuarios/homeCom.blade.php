@extends('layouts.app')

@section('content')
<style>
    .mt-5{
        display: flex;
        flex-direction: column;
}
</style>
<div class="container mt-5">

    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <h1 class="display-4">Bem-vindo ao Gerenciamento de Projetos</h1>
        <p class="lead">Gerencie seus projetos de forma eficiente e intuitiva com nossa plataforma.</p>
        <hr class="my-4">
        <p>Explore as funcionalidades que temos a oferecer:</p>
        <ul class="list-unstyled">
            <li><i class="bi bi-check-circle-fill text-success"></i> Criação e atribuição de tarefas</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Controle de progresso de projetos</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Comunicação em equipe</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Relatórios e análises</li>
        </ul>
        <a class="btn btn-primary btn-lg mt-3" href="#" role="button">Saiba mais</a>
    </div>

    <!-- Cards Section: Projetos Dinâmicos -->
    <div class="mt-5">
        <h2 class="text-center mb-4">Projetos Recentes</h2>
        @foreach($projetos as $projeto)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">{{ $projeto->nomeProjeto }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $projeto->nomeProjeto }}</h5>
                    <p class="card-text">{{ $projeto->descricaoProjeto }}</p>
                    <p><strong>Criador:</strong> {{ $projeto->criador->nome }}</p>
                    <p><strong>Equipe:</strong> {{ $projeto->equipe->nomeEquipe }}</p>
                    <p><strong>Data de Término:</strong> {{ \Carbon\Carbon::parse($projeto->terminoProjeto)->format('d/m/Y') }}</p>
                    <a href="#" class="btn btn-primary">Detalhes</a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Progress Bar Section -->
    <div class="mt-5">
        <h2 class="text-center mb-4">Progresso dos Projetos</h2>
        @foreach($projetos as $projeto)
            <div class="mb-4">
                <h5>{{ $projeto->nomeProjeto }}</h5>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ rand(30, 100) }}%" aria-valuenow="{{ rand(30, 100) }}" aria-valuemin="0" aria-valuemax="100">{{ rand(30, 100) }}% Completo</div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Table Section -->
    <div class="mt-5">
        <h2 class="text-center mb-4">Equipe e Projetos Ativos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do Projeto</th>
                    <th scope="col">Responsável</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projetos as $index => $projeto)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $projeto->nomeProjeto }}</td>
                    <td>{{ $projeto->criador->nome }}</td>
                    <td><span class="badge bg-warning text-dark">Em Progresso</span></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Detalhes</a>
                        <a href="#" class="btn btn-sm btn-danger">Cancelar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-5">
        <a class="btn btn-lg btn-warning" href="#">Crie um Novo Projeto</a>
    </div>
</div>
@endsection
