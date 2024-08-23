<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Corrigido o caminho da view
        return view('home');
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
