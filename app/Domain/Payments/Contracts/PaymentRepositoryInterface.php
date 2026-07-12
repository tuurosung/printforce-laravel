<?php

namespace App\Domain\Payments\Contracts;

use App\Contracts\BaseInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\DTOs\Payments\PaymentData;
use Illuminate\Database\Eloquent\Collection;

interface PaymentRepositoryInterface extends BaseInterface
{

    public function getLatest(int $limit = 100): Collection;


    // CRUD
    public function store(PaymentData $paymentData): CustomerPayment;

    public function update(CustomerPayment $customerPayment, PaymentData $paymentData): bool;

    public function delete(CustomerPayment $customerpayment): bool;

}
