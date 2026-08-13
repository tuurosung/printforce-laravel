<?php

namespace App\Providers;


use App\Domain\Invoices\Contracts\InvoiceItemRepositoryInterface;
use App\Domain\Invoices\Repositories\InvoiceItemRepository;
use App\Domain\Payments\Contracts\PaymentAlertInterface;
use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Repositories\PaymentRepository;
use App\Domain\Payments\Services\PaymentAlertService;
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
    public array $bindings = [
        InvoiceItemRepositoryInterface::class => InvoiceItemRepository::class,
        PaymentRepositoryInterface::class => PaymentRepository::class,
        PaymentAlertInterface::class => PaymentAlertService::class,
        SupplierRepositoryInterface::class => SupplierRepository::class,
        PurchaseRepositoryInterface::class => PurchaseRepository::class,
        PurchasePaymentRepositoryInterface::class => PurchasePaymentRepository::class,
        UserRepositoryInterface::class => UserRepository::class
    ];
}
