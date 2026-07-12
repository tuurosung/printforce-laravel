<?php

namespace App\Domain\Payments\Contracts;

use App\Contracts\BaseInterface;
use App\Domain\Customers\Models\Customer;

interface PaymentAlertInterface
{
    public function buildPaymentMessage(Customer $customer, float $amountPaid): string;
}
