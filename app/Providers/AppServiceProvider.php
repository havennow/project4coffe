<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use App\Classes\Github;
use App\Classes\Gitlab;
use App\Classes\Bitbucket;
use App\Classes\Gitea;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Relation::morphMap(Config::get('database.relation'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        foreach (Config::get('app.services') as $service) {
            $this->app->singleton($service, function () use ($service) {
                $namespace = 'App\\Services\\' . $service;
                return new $namespace();
            });
        }

        $this->app->singleton('Github', function () {
            return new Github();
        });

        $this->app->singleton('Gitlab', function () {
            return new Gitlab();
        });

        $this->app->singleton('Bitbucket', function () {
            return new Bitbucket();
        });

        $this->app->singleton('Gitea', function () {
            return new Gitea();
        });
    }

    public function provides()
    {
        return ['Github', 'Gitlab', 'Gitea'];
    }
}
