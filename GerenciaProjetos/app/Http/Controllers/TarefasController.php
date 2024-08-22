<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarefasController extends Controller
{
    public function index()
    {
        // Obtém o usuário autenticado
        $tarefas = Tarefa::all();

        /*      // Obtém todas as equipes associadas ao usuário
        $equipes = Tarefa::where('usuCriadorEquipe', $usuario->id)->get();
 */
        // Retorna a view com as equipes
        return view('tarefas.index', compact('tarefas'));
    }


    // Exibe o formulário de criação de projeto
    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'nomeTarefa' => 'required|string|max:255',
            'prazoTarefa' => 'required|date',
            'descricaoTarefa' => 'nullable|string',
            'atribuicaoTarefa' => 'required|string|max:255',
        ]);

        // Criação do projeto
        Tarefa::create([
            'nomeTarefa' => $validatedData['nomeTarefa'],
            'prazoTarefa' => $validatedData['prazoTarefa'],
            'descricaoTarefa' => $validatedData['descricaoTarefa'],
            'atribuicaoTarefa' => $validatedData['atribuicaoTarefa'],

        ]);

        // Redireciona para a página de projetos com uma mensagem de sucesso
        return redirect()->route('tarefas.index')->with('success', 'Projeto criado com sucesso!');

        /* 
            // Criação da nova tarefa
        $tarefa = Tarefa::create($validatedData);


        // Retorna uma resposta de sucesso, pode ser um redirecionamento ou um JSON
        return response()->json([
            'message' => 'Tarefa criada com sucesso!',
            'tarefa' => $tarefa,
        ], 201); // Código de status HTTP 201 (Created) */
    }

    // Exibe os detalhes de um projeto específico
    public function show($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        return view('tarefas.show', compact('tarefa'));
    }

    // Exibe o formulário de edição de um projeto específico
    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        return view('tarefas.edit', compact('tarefa'));
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
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update($validatedData);

        // Redireciona para a página de detalhes do projeto com uma mensagem de sucesso
        return redirect()->route('tarefas.show', $tarefa->id)->with('success', 'Tarefa atualizado com sucesso!');
    }

    // Exclui um projeto específico
    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluído com sucesso!');
    }
}
