<?php

namespace App\Providers;

use App\HomeWorkSolid\DistanceCalculator;
use App\HomeWorkSolid\DistanceCalculatorInterface;
use App\HomeWorkSolid\PlacesFilter;
use App\HomeWorkSolid\PlacesFilterInterface;
use App\HomeWorkSolid\PlacesService;
use App\HomeWorkSolid\PlacesServiceInterface;
use App\HomeWorkSolid\PlacesSorter;
use App\HomeWorkSolid\PlacesSorterInterface;
use App\HomeWorkSolid\ProcessPlacesClient;
use App\HomeWorkSolid\ProcessPlacesClientInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PlacesServiceInterface::class, function ($app) {
            return new PlacesService(new GuzzleClient());
        });

        $this->app->singleton(ClientInterface::class, function ($app) {
            return new GuzzleClient();
        });

        $this->app->singleton(DistanceCalculatorInterface::class, function ($app) {
            return new DistanceCalculator(46.4774700, 30.7326200);
        });

        $this->app->singleton(PlacesSorterInterface::class, function ($app) {
            return new PlacesSorter();
        });

        $this->app->singleton(PlacesFilterInterface::class, function ($app) {
            return new PlacesFilter();
        });

        $this->app->singleton(ProcessPlacesClientInterface::class, function ($app) {
            return new ProcessPlacesClient(
                $app->make(PlacesServiceInterface::class),
                $app->make(DistanceCalculatorInterface::class),
                $app->make(PlacesSorterInterface::class),
                $app->make(PlacesFilterInterface::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
