<?php

namespace LaPress\WordPress\Routing;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use LaPress\WordPress\Routing\Http\Middleware\AdminMiddleware;
use LaPress\WordPress\Routing\Http\Middleware\TemplateMiddleware;
use LaPress\WordPress\Routing\Http\Middleware\XmlMiddleware;
use Spatie\ResponseCache\Middlewares\CacheResponse;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class RoutingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Route::prefix(config('wordpress.url.backend_prefix'))
             ->namespace('LaPress\WordPress\Routing\Http\Controllers')
             ->group(__DIR__.'/routes.php');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['router']->aliasMiddleware('wp-admin', AdminMiddleware::class);
        $this->app['router']->aliasMiddleware('wp-template', TemplateMiddleware::class);
        $this->app['router']->aliasMiddleware('xml', XmlMiddleware::class);
        $this->app['router']->aliasMiddleware('cache.response', CacheResponse::class);
    }
}
