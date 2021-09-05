<?php

namespace App\Providers;

use App\Services\NewsletterService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsletterService::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server'),
            ]);

            return new NewsletterService($client);
        });
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
