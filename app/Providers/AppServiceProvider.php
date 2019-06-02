<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AdviserInterface;

use App\Http\Utils\AdviserUtils;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdviserInterface::class, AdviserUtils::class);
    }
}
