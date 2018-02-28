<?php

namespace ProjetoDigital\Providers;

use ProjetoDigital\Models\City;
use ProjetoDigital\Models\Role;
use ProjetoDigital\Models\User;
use ProjetoDigital\Repositories\Users;
use ProjetoDigital\Repositories\Roles;
use ProjetoDigital\Repositories\Rules;
use ProjetoDigital\Repositories\Cities;
use Illuminate\Support\ServiceProvider;

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

        $this->app->bind(Cities::class, function () {
            return new Cities(City::query());
        });

        $this->app->bind(Users::class, function () {
            return new Users(User::query());
        });
    }
}
