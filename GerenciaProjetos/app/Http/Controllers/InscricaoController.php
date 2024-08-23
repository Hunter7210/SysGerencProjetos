<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao; // Certifique-se de ter o modelo Inscricao
use App\Models\Usuario; // Para listar os usuários no formulário
use App\Models\Projeto; // Para listar os projetos no formulário
use Illuminate\Support\Facades\Auth;

class InscricaoController extends Controller
{
    public function index()
    {
        $usuarioId = Auth::id();
        $inscricoes = Inscricao::where('idUsuarioFK', $usuarioId)
            ->with('projeto')
            ->get();

        return view('inscricoes.index', ['inscricoes' => $inscricoes]);
    }

    public function create($id)
    {
        $projeto = Projeto::findOrFail($id);
        return view('inscricoes.create', ['projeto' => $projeto]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idProjetoFK' => 'required|exists:projetos,id',
            'descricaoSolicitacao' => 'required|string|max:255',
            'nomeUsu' => 'required|string|max:255',
        ]);

        Inscricao::create([
            'idUsuarioFK' => Auth::id(),
            'idProjetoFK' => $request->input('idProjetoFK'),
            'nomeUsuSolit' => $request->input('nomeUsu'),
            'descricaoSolicitacao' => $request->input('descricaoSolicitacao'),
        ]);

        return redirect()->route('inscricoes.index')->with('success', 'Inscrição criada com sucesso!');
    }

    public function show($id)
    {
        $inscricao = Inscricao::findOrFail($id);
        return view('inscricoes.show', ['inscricao' => $inscricao]);
    }

    public function edit($id)
    {
        $inscricao = Inscricao::findOrFail($id);
        $projetos = Projeto::all();
        return view('inscricoes.edit', ['inscricao' => $inscricao, 'projetos' => $projetos]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idProjetoFK' => 'required|exists:projetos,id',
            'descricaoSolicitacao' => 'required|string|max:255',
            'nomeUsu' => 'required|string|max:255',
        ]);

        $inscricao = Inscricao::findOrFail($id);
        $inscricao->update([
            'idProjetoFK' => $request->input('idProjetoFK'),
            'nomeUsuSolit' => $request->input('nomeUsu'),
            'descricaoSolicitacao' => $request->input('descricaoSolicitacao'),
        ]);

        return redirect()->route('inscricoes.index')->with('success', 'Inscrição atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $inscricao = Inscricao::findOrFail($id);
        $inscricao->delete();

        return redirect()->route('inscricoes.index')->with('success', 'Inscrição deletada com sucesso!');
    }
}