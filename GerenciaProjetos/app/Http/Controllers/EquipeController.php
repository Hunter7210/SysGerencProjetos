<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipeController extends Controller
{
    public function index()
    {
        // Obtém o usuário autenticado
        $usuario = Auth::user();

        // Obtém todas as equipes associadas ao usuário
        $equipes = Equipe::where('usuCriadorEquipe', $usuario->id)->get();

        // Retorna a view com as equipes
        return view('equipes.dashboard', compact('equipes'));
    }


    // Exibe o formulário de cadastro de equipe
    public function cadastroForm()
    {
        return view('equipes.cadastro');
    }

    // Processa o cadastro de uma nova equipe
    public function cadastro(Request $request)
    {
        $validatedData = $request->validate([
            'nomeEquipe' => 'required|string|max:255',
            'qtdMembrosEquipe' => 'required|integer|min:1',
        ]);

        Equipe::create([
            'nomeEquipe' => $validatedData['nomeEquipe'],
            'qtdMembrosEquipe' => $validatedData['qtdMembrosEquipe'],
            'usuCriadorEquipe' => Auth::id(),
        ]);

        // Redireciona para a página de index com uma mensagem de sucesso
        return redirect()->route('equipes.dashboard')->with('success', 'Equipe cadastrada com sucesso!');
    }
    public function show(Equipe $equipe)
    {
        return view('equipes.show', compact('equipe'));
    }
}
