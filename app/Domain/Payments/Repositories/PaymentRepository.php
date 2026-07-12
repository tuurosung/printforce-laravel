<?php

namespace App\Domain\Payments\Repositories;


use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\DTOs\Payments\PaymentData;
use App\Services\BaseService;
use DomainException;
use Illuminate\Database\Eloquent\Collection;

class PaymentRepository extends BaseService implements PaymentRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly CustomerPayment $model
    ){}


    protected function modelClass(): string
    {
        return CustomerPayment::class;
    }


    public function getLatest(int $limit = 100): Collection
    {
        return $this->model->query()
            ->with(['customer', 'account'])
            ->orderBy('payment_date', 'desc')
            ->limit($limit)
            ->get();
    }


    // CRUD
    public function store(PaymentData $paymentData): CustomerPayment
    {
        $customerPayment = $this->model->create($paymentData->toArray());

        if (! $customerPayment) {
            throw new DomainException('Payment failed. Please try again');
        }

        return $customerPayment;
    }

    public function update(CustomerPayment $customerPayment, PaymentData $paymentData): bool
    {
        if (! $customerPayment->update($paymentData->toArray())) {
            throw new DomainException('Unable to update payment information');
        }

        return true;
    }

    public function delete(CustomerPayment $customerpayment): bool
    {
        if (! $customerpayment->delete()) {
            throw new DomainException('Unable to delete payment');
        }

        return true;
    }
}
