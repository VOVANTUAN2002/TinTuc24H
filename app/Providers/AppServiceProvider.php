<?php

namespace App\Providers;

use App\Repositories\Eloquent\CategorieRepository;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\NewInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Services\Interfaces\NewServiceInterface;
use App\Services\NewService;

use App\Repositories\Eloquent\UserGroupRepository;

use App\Repositories\Interfaces\UserGroupInterface;
use App\Services\Interfaces\UserGroupServiceInterface;
use App\Services\UserGroupService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
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
        $this->app->singleton(UserGroupInterface::class, UserGroupRepository::class);
        $this->app->singleton(UserGroupServiceInterface::class, UserGroupService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    Paginator::useBootstrapFive();
    Paginator::useBootstrapFour();
    Schema::defaultStringLength(191);
    }
}
