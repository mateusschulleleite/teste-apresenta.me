<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function login(Request $request) {

        // valida os dados recebidos
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // tenta autenticar o usuário
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Login realizado com sucesso'
            ]);
        }

        

        return response()->json([
            'success' => false,
            'message' => 'Email ou senha inválidos'
        ], 401);
    }
}