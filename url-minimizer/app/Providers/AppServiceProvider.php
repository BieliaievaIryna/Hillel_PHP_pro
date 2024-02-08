<?php

namespace App\Providers;

use App\ShortUrl\ShortUrlService;
use App\ShortUrl\ShortUrlServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ShortUrlServiceInterface::class, ShortUrlService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
