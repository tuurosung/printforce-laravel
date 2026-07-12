<?php

namespace App\Domain\Customers\Services;


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

    use CustomerCRUD;

    public function __construct(
        private Customer $model,
        private AccountService $accountService,
        private readonly CustomerStatistics $statistics
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





    public function filterCustomers(string $searchTerm): Collection
    {
        return $this->model->where(function ($query) use ($searchTerm) {
            $query->whereLike('name', $searchTerm)
                ->orWhereLike('phone', $searchTerm)
                ->orWhereLike('category', $searchTerm);
        })
            ->limit(10)
            ->get();
    }


    public function getIndexData(): array
    {
        return [
            'customers' => $this->getLatestCustomers(),
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

    public function getLatestCustomers(): Collection
    {
        return $this->baseQuery()->take(100)->get();
    }


    private function baseQuery()
    {
        return $this->model->orderBy('created_at','desc');
    }

}
