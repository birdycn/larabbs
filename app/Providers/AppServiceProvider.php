<?php

namespace App\Providers;

use App\Models;
use App\Observers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale('zh');
        Models\Topic::observe(Observers\TopicObserver::class);
        Models\User::observe(Observers\UserObserver::class);
        Models\Reply::observe(Observers\ReplyObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }
}
