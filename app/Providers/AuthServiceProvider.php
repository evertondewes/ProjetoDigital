<?php

namespace ProjetoDigital\Providers;

use ProjetoDigital\Models\Project;
use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Person;
use ProjetoDigital\Policies\ProjectPolicy;
use ProjetoDigital\Policies\UserPolicy;
use ProjetoDigital\Policies\PersonPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Person::class => PersonPolicy::class,
        Project::class => ProjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
