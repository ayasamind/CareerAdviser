<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Adviser\AdviserInterface;
use App\Repositories\Slack\SlackRepositoryInterface;
use App\Repositories\Slack\SlackRepository;
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
        $this->app->bind(SlackRepositoryInterface::class, SlackRepository::class);
    }
}
