<?php

namespace App\Domain\Customers\Services;

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Customers\Contracts\CustomerServiceInterface;
use App\Domain\Customers\Models\Customer;
use App\Services\Accounting\AccountService;
use App\Services\BaseService;
use App\Traits\Cacheable;
use App\Traits\Customers\CustomerCRUD;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Override;

class CustomerService extends BaseService implements CustomerServiceInterface
{
    use Cacheable;

    public function __construct(
        private Customer $model,
        private AccountService $accountService,
        private readonly CustomerStatistics $statistics,
        private readonly CustomerRepositoryInterface $customers,
    ){}


    protected function modelClass(): string
    {
        return Customer::class;
    }

    protected string $selectOptionKey = "customer_id";
    protected string $selectOptionValue = "name";


    public function findById(string $customerId): Customer
    {
        return $this->model->where('customer_id', $customerId)->firstOrFail();
    }



    public function getIndexData(): array
    {
        return [
            'statistics' => $this->statistics->statistics(),
        ];
    }


    public function getShowData(Customer $customer): array
    {
        return [
            'customer' => $customer,
            'payment_accounts' => $this->accountService->getAssetAccounts(),
        ];
    }


    public function setCustomerSession(Customer $customer): void
    {
        Session::put(['current_customer' => $customer->customer_id]);
    }




    public function customerList()
    {
        return Customer::query()
            ->select(['customer_id', 'name', 'phone'])
            ->withSum('invoices as invoice_total', 'invoice_total')
            ->withSum('printforceJobs as job_total', 'total')
            ->withSum('payments as paid', 'amount_paid')
            ->get()
            ->map(function (Customer $customer): Customer {

                $billed  = (int) ($customer->invoice_total ?? 0)
                    + (int) ($customer->job_total ?? 0);

                $paid    = (int) ($customer->paid ?? 0);

                $customer->balance = $billed - $paid;

                return $customer;
            });
    }

}
