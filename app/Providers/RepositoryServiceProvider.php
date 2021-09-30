<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MyApp\Domain\Models\Employee\EmployeeRepository;
use MyApp\Infrastructure\Storage\Eloquent\Repositories\EloquentEmployeeRepository;

class RepositoryServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register() {
        $this->app->bind(EmployeeRepository::class, EloquentEmployeeRepository::class);
    }
}

