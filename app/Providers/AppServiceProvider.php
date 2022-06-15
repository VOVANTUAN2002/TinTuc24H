<?php

namespace App\Providers;

use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\UserGroupRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Interfaces\UserGroupInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Services\Interfaces\UserGroupServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\UserGroupService;
use App\Services\UserService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RepositoryInterface::class, EloquentRepository::class);
        $this->app->singleton(UserGroupInterface::class, UserGroupRepository::class);
        $this->app->singleton(UserGroupServiceInterface::class, UserGroupService::class);
        $this->app->singleton(UserInterface::class, UserRepository::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);


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
