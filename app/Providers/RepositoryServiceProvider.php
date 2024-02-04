<?php

namespace App\Providers;

use App\Repositories\Eloquent\FavoriteQuoteRepository;
use App\Repositories\Eloquent\QuoteRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\FavoriteQuoteRepositoryInterface;
use App\Repositories\QuoteRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(QuoteRepositoryInterface::class, QuoteRepository::class);
        $this->app->bind(FavoriteQuoteRepositoryInterface::class, FavoriteQuoteRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
