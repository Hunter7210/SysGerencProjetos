<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Buscar todos os projetos com suas relações
        $projetos = Projeto::with(['criador', 'equipe'])->get();

        // Passar os dados para a view
        return view('home', compact('projetos'));
    }

    public function homeCom()
    {
        $usuario = Auth::user();

        // Obtém projetos relacionados ao usuário
        $projetos = Projeto::where('criadorProjetoFk', $usuario->id)->get();

        // Obtém equipes das quais o usuário participa
        // Certifique-se de que o relacionamento 'equipes' está definido no modelo Usuario
        // $equipes = $usuario->equipes;

        return view('usuarios.homeCom', [
            'projetos' => $projetos,
            /*  'equipes' => $equipes */
        ]);
    }
}
