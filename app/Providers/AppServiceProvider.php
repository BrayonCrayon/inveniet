<?php

namespace App\Providers;

use App\Models\UserRelationship;
use App\Observers\UserRelationshipObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        UserRelationship::observe(UserRelationshipObserver::class);
    }
}
