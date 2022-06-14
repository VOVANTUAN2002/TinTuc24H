<?php

namespace App\Providers;

use App\Repositories\Eloquent\CategorieRepository;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\NewInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Services\Interfaces\NewServiceInterface;
use App\Services\NewService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\NewRepository;
use App\Repositories\Interfaces\CategorieInterface;
use App\Services\CategorieService;
use App\Services\Interfaces\CategorieServiceInterface;

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
        $this->app->singleton(CategorieInterface::class, CategorieRepository::class);
        /* Binding  Service*/
        $this->app->singleton(NewServiceInterface::class, NewService::class);
        $this->app->singleton(CategorieServiceInterface::class, CategorieService::class);
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
