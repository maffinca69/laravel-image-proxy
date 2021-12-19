<?php

namespace Maffinca69\ImageProxy;

use Illuminate\Support\Arr;
use Maffinca69\ImageProxy\Providers\WeServ;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    private array $providerAliases = [
        'weserv' => WeServ::class
    ];

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config.php' => config_path('laravel-image-proxy.php')
        ], 'config');
    }

    public function register()
    {
        $this->app->singleton(ImageProxy::class, function ($app) {
            $providerClass = config('laravel-image-proxy.provider');
            $options = config('laravel-image-proxy.providers.'.$providerClass, []);

            if (array_key_exists($providerClass, $this->providerAliases)) {
                $providerClass = $this->providerAliases[$providerClass];
            }

            return new ImageProxy(
                $app->make($providerClass, [
                    'options' => Arr::except($options, 'default_options')
                ]),
                (array)Arr::get($options, 'default_options', [])
            );
        });
    }
}
