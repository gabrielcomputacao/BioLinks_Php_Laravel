<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MakeLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth/login');
    }

    public function login(MakeLoginRequest $request)
    {

        /*  
            // = Não precisa de passar as regras nesse local
            //  = pois o laravel cria uma classe para manipular as regras de uma requisicao
       
            request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]); */


        if ($request->tryToLogin()) {

            return to_route('dashboard');
        }


        return back()->with(['message' => 'Não encontrado']);
    }
}
