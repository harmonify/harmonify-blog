<?php

namespace App\Providers;

use App\Services\NewsletterInterface;
use App\Services\MailchimpNewsletter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use MailchimpMarketing\ApiClient;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsletterInterface::class, function () {
            //  if (someCondition)
            //      $client = new OtherApiClient();
            //      return new OtherNewsletter($client);
            //  else
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => config('services.mailchimp.server'),
            ]);

            return new MailchimpNewsletter($client);
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
        Model::preventLazyLoading(! app()->isProduction());
    }
}
