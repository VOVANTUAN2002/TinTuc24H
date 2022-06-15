<?php

namespace App\Providers;

use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\UserGroupRepository;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Interfaces\UserGroupInterface;
use App\Services\Interfaces\UserGroupServiceInterface;
use App\Services\UserGroupService;


use App\Repositories\Eloquent\AuthRepository;
use App\Repositories\Interfaces\AuthInterface;
use App\Services\AuthService;
use App\Services\Interfaces\AuthServiceInterface;

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

        //Auth
        $this->app->singleton(AuthInterface::class,AuthRepository::class);
        $this->app->singleton(AuthServiceInterface::class, AuthService::class);

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
