@extends('layouts.app')

@section('content')
<div class="container mt-5">
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
</div>
@endsection
