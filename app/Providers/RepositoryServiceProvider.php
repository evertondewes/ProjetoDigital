<?php

namespace ProjetoDigital\Providers;

use ProjetoDigital\Models\Role;
use ProjetoDigital\Repositories\Roles;
use Illuminate\Support\ServiceProvider;
use ProjetoDigital\Repositories\Rules;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Roles::class, function () {
            return new Roles(Role::query());
        });

        $this->app->singleton(Rules::class, function ($app) {
            return new Rules($app['config']['validation']['rules']);
        });
    }
}
