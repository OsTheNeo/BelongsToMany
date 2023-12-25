<?php

namespace OsTheNeo\BelongsToMany;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Nova::serving(function (ServingNova $event) {
            Nova::script('belongstomany', __DIR__.'/../dist/js/field.js');
            Nova::style('belongstomany', __DIR__.'/../dist/css/field.css');
        });

        $this->app->booted(function () {
            Route::middleware(['nova'])->domain(config('nova.domain', null))
                ->prefix('nova-vendor/belongs_to_many')->group(__DIR__
                    .'/../routes/api.php');
        });

        $this->publishes([
            __DIR__
            .'/../resources/lang/' => resource_path('lang/vendor/belongs-to-many-field-nova'),
        ]);
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang',
            'belongs-to-many-field-nova');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
