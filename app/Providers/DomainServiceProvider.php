<?php

namespace App\Providers;

use App\Domain\Accounts\Contracts\AccountRepositoryInterface;
use App\Domain\Accounts\Repositories\AccountRepository;
use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Customers\Repositories\CustomerRepository;
use App\Domain\Ledger\Contracts\LedgerInterface;
use App\Domain\Ledger\Contracts\TransactionRepositoryInterface;
use App\Domain\Ledger\Repositories\TransactionRepository;
use App\Domain\Ledger\Services\LedgerService;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CustomerRepositoryInterface::class => CustomerRepository::class,

        AccountRepositoryInterface::class => AccountRepository::class,
        TransactionRepositoryInterface::class => TransactionRepository::class,
        LedgerInterface::class => LedgerService::class
    ];
}
