    <!-- resources/views/home.blade.php -->

    @extends('layouts.app')

    @section('content')

        <div class="container">
            <h1>Bem-vindo, {{ Auth::user()->nomeUsuario }}!</h1>

            <!-- Informações do Usuário -->
            <div class="mb-4">
                <h2>Informações do Usuário</h2>
                <p><strong>Nome:</strong> {{ Auth::user()->nomeUsuario }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->emailUsuario }}</p>
                <p><strong>Cargo:</strong> {{ Auth::user()->cargo }}</p>
            </div>

            <!-- Projetos Relacionados ao Usuário -->
            <div class="mb-4">
                <h2>Projetos Relacionados</h2>
                @if ($projetos->isEmpty())
                    <p>Você não está participando de nenhum projeto.</p>
                    <a href="{{ route('projetos.index') }}">Ver Projetos</a>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome do Projeto</th>
                                <th>Descrição</th>
                                <th>Data de Término</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projetos as $projeto)
                                <tr>
                                    <td>{{ $projeto->nomeProjeto }}</td>
                                    <td>{{ $projeto->descricaoProjeto }}</td>
                                    <td>{{ $projeto->terminoProjeto ? $projeto->terminoProjeto->format('d/m/Y') : 'Não definido' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            {{--   <!-- Equipes do Usuário -->
            <div class="mb-4">
                <h2>Equipes das Quais Você Participa</h2>
                @if ($equipes->isEmpty())
                    <p>Você não está participando de nenhuma equipe.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome da Equipe</th>
                                <th>Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipes as $equipe)
                                <tr>
                                    <td>{{ $equipe->nomeEquipe }}</td>
                                    <td>{{ $equipe->descricao }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div> --}}
        </div>
    @endsection
