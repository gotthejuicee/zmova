<?php

namespace App\Providers;

use App\Services\TelegramNotifier;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(TelegramNotifier::class, fn () => new TelegramNotifier(
            token: config('services.telegram.token'),
            chatId: config('services.telegram.chat_id'),
        ));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
