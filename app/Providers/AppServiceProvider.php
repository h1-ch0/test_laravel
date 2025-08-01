<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Vite;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        
        // Gate::define('is-admin', function (User $user) {
        //     // \Log::info('is-admin Gate Check', ['user_id' => $user->id, 'is_admin' => $user->is_admin]);
        //     // return $user->is_admin === 1;
        // // return $user->is_admin;
        //     return (bool) $user->is_admin==1;

        // });
    }
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}

