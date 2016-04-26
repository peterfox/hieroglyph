<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     Hieroglyph
 */

namespace Hieroglyph\Laravel;

use Hieroglyph\Hiero;
use Illuminate\Support\ServiceProvider;

class HieroglyphServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Hiero::class, function ($app) {
            $defaultSet = config('hieroglyph.default');

            $parameters = collect(collect(config('hieroglyph'))->get($defaultSet));

            return new Hiero(
                $parameters->get('template'),
                $parameters->get('icons'),
                $parameters->get('modifiers', []),
                $parameters->get('prefix', '')
            );


        });

        $this->app->bind('hiero', function($app)
        {
            return $app->make(Hiero::class);
        });

        $this->publishes([
            __DIR__.'/../../configs/hieroglyph.php' => config_path('hieroglyph.php'),
        ]);
    }
}