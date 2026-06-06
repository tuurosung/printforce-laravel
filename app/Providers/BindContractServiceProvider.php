<?php

namespace App\Providers;

use App\Contracts\Customers\CustomerServiceContract;
use App\Contracts\Invoices\InvoiceServiceContract;
use App\Services\Customers\CustomerService;
use App\Services\Invoices\CustomerInvoiceService;
use Illuminate\Support\ServiceProvider;

class BindContractServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(
            InvoiceServiceContract::class,
            CustomerInvoiceService::class
        );

        $this->app->bind(
            CustomerServiceContract::class,
            CustomerService::class
        );
    }
}
