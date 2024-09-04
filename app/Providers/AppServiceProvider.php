<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();
        \Debugbar::enable();
        app()->setLocale('en');

        $topUsers = Cache::remember('topUsers', now()->addMinutes(3), function (){
            return User::withCount('ideas')->orderBy('ideas_count', 'desc')->limit(5)->get();
        });

        View::share('topUsers', $topUsers);
    }
}
