<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Models\Usuario::created(function($usuario) {
            $dadosInsert = ['id_usuario' => $usuario->id];

            if ($usuario->tipo == \App\Source\Usuario\Tipo::CLIENTE) {
                \App\Models\Cliente::create($dadosInsert);
            } elseif ($usuario->tipo == \App\Source\Usuario\Tipo::MOTOBOY) {
                \App\Models\Motoboy::create(
                    array_merge($dadosInsert, ['status' => \App\Source\Motoboy\Status::DISPONIVEL])
                );
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
