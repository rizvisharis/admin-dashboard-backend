<?php

namespace App\Providers;

use App\Repositories\Contracts\RecordRepositoryInterface;
use App\Repositories\RecordRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RecordRepositoryInterface::class, RecordRepository::class);
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
