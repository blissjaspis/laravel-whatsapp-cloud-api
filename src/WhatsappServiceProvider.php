<?php

namespace BlissJaspis\WhatsappCloudApi;

use Illuminate\Support\ServiceProvider;

class WhatsappServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/whatsapp-cloud-api.php' => config_path('whatsapp-cloud-api.php')
            ], 'config');
        }
    }

    public function register()
    {
        $this->app->singleton(Whatsapp::class);

        $this->mergeConfigFrom(__DIR__.'/../config/whatsapp-cloud-api.php', 'whatsapp-cloud-api');
    }
}