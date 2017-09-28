<?php

namespace App\Providers;

use App\Contracts\UserContract;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;


class UserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('user', function ($app)
        {
            return new UserRepository();
        });

        $this->app->singleton(UserContract::class, function ($app)
        {
            return new UserRepository();
        });
    }
}
