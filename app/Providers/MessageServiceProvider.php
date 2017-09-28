<?php

namespace App\Providers;

use App\Contracts\MessageContract;
use App\Repositories\MessageRepository;
use Illuminate\Support\ServiceProvider;
use App\Message;
use App\Observers\MessageObserver;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Message::observe(MessageObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepository();
    }

    public function registerRepository()
    {
        $this->app->singleton('message', function ($app)
        {
            return new MessageRepository();
        });

        $this->app->singleton(MessageContract::class, function ($app)
        {
            return new MessageRepository();
        });
    }
}
