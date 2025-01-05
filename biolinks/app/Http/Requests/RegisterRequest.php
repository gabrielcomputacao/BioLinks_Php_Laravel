<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

/**
 * 
 * @property-read string $name
 * @property-read string $email
 * @property-read string $password
 * 
 */

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        /* 
            unique:users regra que checa no banco de dados se aquele email ja foi usado , pois o email e unico
            Obs: se nao colocar o sistema quebra como regra de banco de dados
        */
        /* 
            Password é um objeto que tem varias funcoes estaticas para validação de password
            como tamanho minimo, se a senha possui letras, numeros, simbolos, ou se ja foi comprometida
            recurso importante nas senhas 
        */

        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'confirmed', 'unique:users'],
            'password' => ['required', Password::min(4)->numbers(),]
        ];
    }

    public function attemptToRegister()
    {

        $user = new User();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;

        $user->save();

        auth()->login($user);

        return true;
    }
}
