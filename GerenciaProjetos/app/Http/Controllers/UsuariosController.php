<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    // Exibir o formulário de login
    public function showLoginForm()
    {
        return view('usuarios.login');
    }


    // Processar o login do usuário
    public function login(Request $request) //Request guarda os valores dos meus campos
    {
        // Validações para o login
        $credentials = $request->validate([
            'email' => ['required', 'emailUsuario'],
            'password' => ['required'],
        ]);


        // Tenta autenticar com o guard 'usuario'
        if (Auth::guard('usuario')->attempt($credentials)) {
            $request->session()->regenerate(); // Regenera a sessão para evitar fixação de sessão
            return redirect()->intended('/dashboard');
        }

        // Se falhar, retorna com erro
        return back()->withErrors([
            'email' => 'As credenciais não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }


    // Exibir o formulário de registro
    public function showRegistroForm()
    {
        return view('usuario.cadastro');
    }


    // Processar o registro de um novo usuário
    public function cadastro(Request $request)
    {
        // Validações para o registro
        $request->validate([
            'nomeUsuario' => 'required|string|max:255',
            'emailUsuario' => 'required|string|email|max:255|unique:usuarios',
            'cargoUsuario' => 'required|numeric',
            'nomeGerenteUsuario' => 'nullable|string|max:255', // Uso de nullable caso o campo não seja obrigatório
            'nomeEmpresaUsuario' => 'nullable|string|max:255',
            'passwordUsuario' => 'required|string|min:8|confirmed',
        ]);

        // Cria um novo usuário
        $usuario = Usuario::create([
            'nomeUsuario' => $request->nome,
            'emailUsuario' => $request->email,
            'cargoUsuario' => $request->cargo,/* 
            'nomeGerenteUsuario' => $request->nomeGerente,*/
            'nomeEmpresaUsuario' => $request->nomeEmpresa, 
            'passwordUsuario' => Hash::make($request->password),
        ]);

        // Faz login automático do novo usuário
        Auth::guard('usuario')->login($usuario);

        return redirect('/dashboard');
    }


    // Realizar o logout do usuário
    public function logout(Request $request)
    {
        Auth::guard('usuario')->logout(); // Logout do guard 'usuario'
        $request->session()->regenerateToken(); // Regenera o token da sessão
        $request->session()->invalidate();
        $request->session()->regenerate(); // Invalida a sessão


        return redirect('/');
    }
}
