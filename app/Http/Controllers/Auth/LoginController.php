<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('alunos.index'); // Redireciona para a página inicial
        }

        return back()->with('error', 'Credenciais inválidas. Verifique seu e-mail e senha.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
