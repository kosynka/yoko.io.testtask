<?php

namespace App\Providers;

use App\Repositories\Contracts\BookRepositoryInterface;
use App\Repositories\V1\BookRepository;
use App\Services\Contracts\BookServiceInterface;
use App\Services\V1\BookService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookServiceInterface::class, BookService::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
