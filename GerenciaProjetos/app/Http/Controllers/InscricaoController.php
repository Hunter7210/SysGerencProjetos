<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao; // Certifique-se de ter o modelo Inscricao
use App\Models\Usuario; // Para listar os usuários no formulário
use App\Models\Projeto; // Para listar os projetos no formulário

class InscricaoController extends Controller
{
    public function create()
    {
        // Obtém todos os usuários e projetos para o formulário
        $usuarios = Usuario::all();
        $projetos = Projeto::all();

        return view('inscricoes.create', compact('usuarios', 'projetos'));
    }

    public function store(Request $request)
    {
        // Valida os dados da solicitação
        $request->validate([
            'idUsuarioFK' => 'required|exists:usuarios,id', // Verifica se o usuário existe
            'idProjetoFK' => 'required|exists:projetos,id', // Verifica se o projeto existe
        ]);

        // Cria uma nova inscrição
        Inscricao::create([
            'idUsuarioFK' => $request->input('idUsuarioFK'),
            'idProjetoFK' => $request->input('idProjetoFK'),
        ]);

        return redirect()->route('inscricoes.index')->with('success', 'Inscrição criada com sucesso!');
    }
}
