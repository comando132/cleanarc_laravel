<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MyApp\Domain\Models\Employee\EmployeeRepository;
use MyApp\Domain\Models\Employee\OfficeRepository;
use MyApp\Infrastructure\Storage\Eloquent\Repositories\EloquentEmployeeRepository;
use MyApp\Infrastructure\Storage\Eloquent\Repositories\EloquentOfficeRepository;

class RepositoryServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register() {
        $this->app->bind(EmployeeRepository::class, EloquentEmployeeRepository::class);
        $this->app->bind(OfficeRepository::class, EloquentOfficeRepository::class);
    }
}
