<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\CaptorRepository;
use App\Repository\ICaptorRepository;
use App\Repository\AdminRepository;
use App\Repository\IAdminRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(ICaptorRepository::class, CaptorRepository::class);
        $this->app->bind(IAdminRepository::class, AdminRepository::class);
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
