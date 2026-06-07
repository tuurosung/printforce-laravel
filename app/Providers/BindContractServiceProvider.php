<?php

namespace App\Providers;

use App\Contracts\Invoices\InvoiceServiceContract;
use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Customers\Repositories\CustomerRepository;
use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Repositories\PaymentRepository;
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
            CustomerRepositoryInterface::class,
            CustomerRepository::class
        );

        $this->app->bind(
            PaymentRepositoryInterface::class,
            PaymentRepository::class
        );
    }
}
