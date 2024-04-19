<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\BillService;
use App\Service\TransactionService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BillService::class, function ($app) {
            return new BillService();
        });
        $this->app->bind(TransactionService::class, function ($app) {
            return new TransactionService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
