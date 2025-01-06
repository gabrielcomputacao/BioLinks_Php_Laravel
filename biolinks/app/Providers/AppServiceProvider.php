<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // = Coloca unguard em todos os models, deixando ser cadastrado qualquer elemento que vier do banco de dados pois o guard nao bloqueia nenhum
        Model::unguard(true);

        // = Quando for chamar qualquer serviço ele verifica se tem um provider e aplica as regras que foram configuradas

        Password::defaults(function () {

            $rules = Password::min(4);

            return $this->app->isProduction()  ? $rules->mixedCase()->uncompromised() : $rules;
        });
    }
}
