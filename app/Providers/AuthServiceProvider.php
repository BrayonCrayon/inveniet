<?php

namespace App\Providers;

use App\Models\Event;
use App\Policies\EventPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Event::class => EventPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('events.view', 'App\Policies\EventPolicy@view');
        Gate::define('events.create', 'App\Policies\EventPolicy@create');
        Gate::define('events.update', 'App\Policies\EventPolicy@update');
        Gate::define('events.delete', 'App\Policies\EventPolicy@delete');
        Gate::define('events.restore', 'App\Policies\EventPolicy@restore');
        Gate::define('events.forceDelete', 'App\Policies\EventPolicy@forceDelete');
    }
}
