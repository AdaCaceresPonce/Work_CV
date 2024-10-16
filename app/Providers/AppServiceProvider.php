<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
        Carbon::setLocale('es');

        //Descomentar el siguiente bloque de código si en produccion no funciona Livewire
        //El /~capacit2 se puede quitar o cambiar dependiendo el dominio, en este caso era necesario porque era parte del enlace
        //Fuente:  https://livewire.laravel.com/docs/installation#configuring-livewires-update-endpoint

        // Livewire::setUpdateRoute(function ($handle) {
        //     return Route::post('/~capacit2/livewire/update', $handle);
        // });

        // Livewire::setScriptRoute(function ($handle) {
        //     return Route::get('/~capacit2/livewire/livewire.js', $handle);
        // });
    }
}
