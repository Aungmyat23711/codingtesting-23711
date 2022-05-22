<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\DepartmentsRepository;
use  App\Interfaces\DepartmentInterface;
use App\Repositories\PositionsRepository;
use  App\Interfaces\PositionInterface;
use App\Repositories\EmployeesRepository;
use  App\Interfaces\EmployeeInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(DepartmentInterface::class, DepartmentsRepository::class);
        $this->app->bind(PositionInterface::class, PositionsRepository::class);
        $this->app->bind(EmployeeInterface::class, EmployeesRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
