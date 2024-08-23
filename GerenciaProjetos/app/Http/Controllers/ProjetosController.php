<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Projeto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetosController extends Controller
{
    // Exibe a lista de projetos associados ao usuário
    public function index()
    {
        // Obtém o usuário autenticado
        $usuario = Auth::user();

       /*  // Obtém os projetos criados pelo usuário ou associados à equipe do usuário
        $projetos = Projeto::where('criadorProjetoFk', $usuario->id)
            ->orWhere('equipeProjetoFk', $usuario->equipe_id)
            ->get(); */

        $projetos = Projeto::all();


        // Retorna a view com os projetos
        return view('projetos.index', compact('projetos'));
    }

    /*   public function indexall()
    {
        // Busca todos os projetos sem considerar a equipe do usuário
        $projetos = Projeto::all();

        // Retorna a view com todos os projetos
        return view('projetos.indexall', compact('projetos'));
    }
 */


    // Exibe o formulário de criação de projeto
    public function create($id)
    {

        $equipe =  Equipe::findOrFail($id);

        // Passar a equipe para a view
        return view('projetos.create', ['equipe' => $equipe]);
    }

    // Processa o formulário de criação de um novo projeto
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nomeProjeto' => 'required|string|max:255',
            'descricaoProjeto' => 'required|string|max:255',
            'terminoProjeto' => 'nullable|date',
            'responsaveisProjeto' => 'required|string|max:255',
            'equipeProjetoFk' => 'required|exists:equipes,id', // Garantir que a equipe exista
        ]);



        // Criação do projeto
        Projeto::create([
            'nomeProjeto' => $validatedData['nomeProjeto'],
            'descricaoProjeto' => $validatedData['descricaoProjeto'],
            'terminoProjeto' => $validatedData['terminoProjeto'],
            'responsaveisProjeto' => $validatedData['responsaveisProjeto'],
            'criadorProjetoFk' => Auth::id(), // O usuário autenticado é o criador do projeto
            'equipeProjetoFk' => $validatedData['equipeProjetoFk'],
        ]);

        // Redireciona para a página de projetos com uma mensagem de sucesso
        return redirect()->route('projetos.index')->with('success', 'Projeto criado com sucesso!');
    }

    // Exibe os detalhes de um projeto específico
    public function show($id)
    {
        $projeto = Projeto::findOrFail($id);

        return view('projetos.show', compact('projeto'));
    }

    // Exibe o formulário de edição de um projeto específico
    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);

        return view('projetos.edit', compact('projeto'));
    }

    // Processa a atualização de um projeto
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nomeProjeto' => 'required|string|max:255',
            'descricaoProjeto' => 'required|string|max:255',
            'terminoProjeto' => 'nullable|date',
            'responsaveisProjeto' => 'required|string|max:255',
            'equipeProjetoFk' => 'required|exists:equipes,id',
        ]);

        // Atualização do projeto
        $projeto = Projeto::findOrFail($id);
        $projeto->update($validatedData);

        // Redireciona para a página de detalhes do projeto com uma mensagem de sucesso
        return redirect()->route('projetos.show', $projeto->id)->with('success', 'Projeto atualizado com sucesso!');
    }

    // Exclui um projeto específico
    public function destroy($id)
    {
        $projeto = Projeto::findOrFail($id);
        $projeto->delete();

        return redirect()->route('projetos.index')->with('success', 'Projeto excluído com sucesso!');
    }
}
