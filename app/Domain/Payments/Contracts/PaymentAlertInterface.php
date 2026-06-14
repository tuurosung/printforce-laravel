<?php

namespace App\Domain\Payments\Contracts;

use App\Models\Customers\Customer;

interface PaymentAlertInterface
{
    public function buildPaymentMessage(Customer $customer, float $amountPaid): string;
}
