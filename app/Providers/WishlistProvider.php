<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WishlistProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('wishlist', function($app)
        {
            $storage = $app['session'];
            $events = $app['events'];
            $instanceName = 'wishlist';
            $session_key = 'AsASDMCks0ks1';
            return new \Cart(
                $storage,
                $events,
                $instanceName,
                $session_key,
                config('shopping_cart')
            );
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
