<?php
namespace AmoryTraore\Actualite;
use Illuminate\Support\ServiceProvider;

class ActualiteServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'actualite');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/views' => resource_path('views/',),
        ], 'views');

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations/')
        ], 'migrations');
    }

    
    public function register(){}
}
