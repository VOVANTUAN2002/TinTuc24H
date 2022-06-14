<?php

namespace App\Providers;

use App\Repositories\Interfaces\NewInterface;
use App\Services\Interfaces\NewServiceInterface;
use App\Services\NewService;

use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Eloquent\EloquentRepository;

use Illuminate\Support\ServiceProvider;

use NewRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /* Binding  Repository*/
        $this->app->singleton(RepositoryInterface::class, EloquentRepository::class);
        //NewInterface - NewRepository
        $this->app->singleton(NewInterface::class, NewRepository::class);

        /* Binding  Service*/
        $this->app->singleton(NewServiceInterface::class, NewService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
