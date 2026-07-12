<?php

namespace App\Providers;

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Customers\Repositories\CustomerRepository;
use App\Domain\Invoices\Contracts\InvoiceItemRepositoryInterface;
use App\Domain\Invoices\Contracts\InvoiceRepositoryInterface;
use App\Domain\Invoices\Repositories\InvoiceItemRepository;
use App\Domain\Invoices\Repositories\InvoiceRepository;
use App\Domain\Payments\Contracts\PaymentAlertInterface;
use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Repositories\PaymentRepository;
use App\Domain\Payments\Services\PaymentAlertService;
use App\Domain\PrintJobs\Contracts\PrintJobRepositoryInterface;
use App\Domain\PrintJobs\Repositories\PrintJobRepository;
use App\Domain\Purchases\Contracts\PurchasePaymentRepositoryInterface;
use App\Domain\Purchases\Contracts\PurchaseRepositoryInterface;
use App\Domain\Purchases\Repositories\PurchasePaymentRepository;
use App\Domain\Purchases\Repositories\PurchaseRepository;
use App\Domain\Suppliers\Contracts\SupplierRepositoryInterface;
use App\Domain\Suppliers\Repositories\SupplierRepository;
use App\Domain\Users\Contracts\UserRepositoryInterface;
use App\Domain\Users\Repositories\UserRepository;
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
            InvoiceRepositoryInterface::class,
            InvoiceRepository::class
        );

        $this->app->bind(
            InvoiceItemRepositoryInterface::class,
            InvoiceItemRepository::class
        );

  
        $this->app->bind(
            PaymentRepositoryInterface::class,
            PaymentRepository::class
        );

        $this->app->bind(
            PaymentAlertInterface::class,
            PaymentAlertService::class
        );

        $this->app->bind(
            SupplierRepositoryInterface::class,
            SupplierRepository::class
        );

        $this->app->bind(
            PurchaseRepositoryInterface::class,
            PurchaseRepository::class
        );

        $this->app->bind(
            PurchasePaymentRepositoryInterface::class,
            PurchasePaymentRepository::class
        );



        $this->app->bind(
            PrintJobRepositoryInterface::class,
            PrintJobRepository::class
        );


        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }
}
