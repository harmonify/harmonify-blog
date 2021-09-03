<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        Paginator::useBootstrap();
        Password::defaults(function () {
            $rule = Password::min(8)
                ->letters()
                ->numbers();

            return $this->app->environment('Production')
                ? $rule->uncompromised(3)
                : $rule;
        });
    }
}
