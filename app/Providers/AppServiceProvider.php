<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Adviser\AdviserInterface;
use App\Repositories\Slack\SlackRepositoryInterface;
use App\Repositories\Slack\SlackRepository;
use App\Http\Utils\AdviserUtils;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // TravisCIでmigrationできるように
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdviserInterface::class, AdviserUtils::class);
        $this->app->bind(SlackRepositoryInterface::class, SlackRepository::class);
    }
}
