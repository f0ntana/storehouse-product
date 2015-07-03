<?php

namespace ResultSystems\Storehouse\Product\Providers;

use Illuminate\Support\ServiceProvider;
use ResultSystems\Storehouse\Providers\SecurityServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Service provider boot
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->loadStorehouseViews();
        $this->loadStorehouseTranslations();
        $this->publishStorehouseConfiguration();
        $this->publishStorehouseAssets();
    }

    /**
     * Service provider registration
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Register IoC Bindings
     */
    protected function registerBindings()
    {
        $this->app->singleton(
            'security.get', function ($app) {
                return new SecurityServiceProvider();
            }
        );
/*
        $this->app->singleton(
            'Storehouse\Product\Contracts\ProductRepository', function ($app) {
                return $app['defender.user'];
            }
        );
*/
        $this->mergeConfigFrom(__DIR__.'/../resources/config/storehouse-product.php', 'storehouse-product');
    }

    /**
     * Register routes.
     */
    protected function registerRoutes()
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = $this->app['router'];

        $group = [];
        $group['prefix'] = $this->app['config']->get('storehouse-product.route_prefix', 'storehouse/product');
        $namespace='\ResultSystems\Storehouse\Product\Http\Controllers';
        $group['namespace'] = $namespace;
        $group['as'] = 'storehouse.product.';

        $security = $this->app['config']->get('storehouse-product.security.protected', true);

        if ($security) {
            $group['middleware']=$this->app['config']->get('storehouse-product.security.middleware', ['auth']);

            $defender = $this->app['config']->get('storehouse-product.security.defender.load', true);

            if ($defender) {
                $group['middleware']=array_merge($group['middleware'], $this->app['config']->get('storehouse-product.security.defender.middleware', true));

                $can=$this->app['config']->get('storehouse-product.security.defender.can', ['storehouse.product.create', 'storehouse.product.store', 'storehouse.product.search', 'storehouse.product.show', 'storehouse.product.update', 'storehouse.product.destroy']);
                if (!is_null($can)) {
                    $group['can']=$can;
                }

                $is=$this->app['config']->get('storehouse-product.security.defender.is');
                if (!is_null($is)) {
                    $group['is']=$is;
                }

                $group['any']=$this->app['config']->get('storehouse-product.security.defender.any', true);
            }
        }
        $security=$this->app['security.router'];
        $router->group($group, function () use ($router, $namespace, $security) {
            require __DIR__.'/../Http/routes.php';
        });
    }

    /**
     * Publish dashboard configuration.
     */
    protected function publishStorehouseConfiguration()
    {
        $this->publishes([
            __DIR__.'/../resources/config/storehouse-product.php' => config_path('storehouse-product.php')
        ], 'config');
    }

    /**
     * Publish storehouse assets to the public path
     */
    protected function publishStorehouseAssets()
    {
        $this->publishes([
            __DIR__.'/../resources/dist' => public_path('storehouse/product')
        ], 'assets');
    }

    /**
     * Load storehouse views.
     */
    protected function loadStorehouseViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views/storehouse-product', 'storehouse-product');
    }

    /**
     * Storehouse translations
     */
    protected function loadStorehouseTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/storehouse-product', 'storehouse-product');
    }

    /**
     *
     * @return array
     */
    public function provides()
    {
        return ['storehouse-product'];
    }
}
