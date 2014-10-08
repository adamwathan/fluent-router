<?php namespace AdamWathan\FluentRouter;

use Illuminate\Support\ServiceProvider;

class FluentRouterServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['adamwathan.router'] = $this->app->share(function ($app) {
            return new FluentRouter($app['router']);
        });
    }

    public function boot()
    {
        require app_path().'/routes2.php';
        $this->app['adamwathan.router']->registerRoutes();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
