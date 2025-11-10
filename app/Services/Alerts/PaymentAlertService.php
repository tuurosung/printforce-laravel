<?php

namespace App\Services\Alerts;

use App\Models\Customers\Customer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MessagingController;
use App\Services\Alerts\MessagingService;

class PaymentAlertService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected $messagingService = new MessagingService()
    ){}

    public function send(string $customerId, float $amountPaid): bool
    {
        $customer    = $this->getCustomer($customerId);

        if (!$customer) {
            Log::warning('Payment Alert failed: customer not found',[
                'customer_id' => $customerId
            ]);

            return false;
        }

        $message = $this->buildPaymentMessage($customer, $amountPaid);
        $sent = $this->messagingService->send($customer->phone, $message);

        return $sent;
    }


    protected function getCustomer(string $customerId): ?Customer
    {
        return Customer::where('customer_id', $customerId)->first();
    }


    protected function buildPaymentMessage(Customer $customer, float $amountPaid): string
    {
        $companyName = $this->getCompanyName();
        $formattedAmount = $this->formatCurrency($amountPaid);
        $formattedBalance = $this->formatCurrency($customer->customer_balance);

        return "Your payment of GHS {$formattedAmount} to {$companyName}  was successful. Your balance is GHS {$formattedBalance}";
    }

    protected function getCompanyName(): string
    {
        return Auth::user()->company->company_name ?? config('app.name');
    }

    protected function formatCurrency(float $amount): string
    {
        return number_format($amount, 2);
    }
}
