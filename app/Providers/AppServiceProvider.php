<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Access\Response;

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
        Gate::define('view-admin', function (?User $user) {
            // if($user->id == 1) {
            //     return Response::allow();
                
            // }
            // return Response::denyAsNotFound();

            return $user->isAdmin() ? Response::allow() : Response::denyAsNotFound();
        });
    }
}
