<?php

namespace App\Providers;

use App\Http\ViewComposers\ProfilComposer;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.app', ProfilComposer::class);
        Paginator::useBootstrap();

        Gate::define('admin',function(User $user){
            return $user->role === 'admin';
        });

        Gate::define('tim_data',function(User $user){
            return $user->role === 'tim_data';
        });

        Gate::define('user',function(User $user){
            return $user->role === 'user';
        });
    }
}
