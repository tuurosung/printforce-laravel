<?php

namespace App\Services\Alerts;

use App\Models\Customers\Customer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MessagingController;
use App\Services\Alerts\MessagingService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

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
        try {

            // dd($customerId, $amountPaid);
            // validate amount
            // if (is_nan($amountPaid) || is_null($amountPaid) || $amountPaid <= 0) {

            //     Log::error('Payment Alert failed: Invalid amount paid', [
            //         'customer_id' => $customerId,
            //         'amount_paid' => $amountPaid
            //     ]);

            //     Log::error($customerId . ' ' . $amountPaid);

            //     throw new \InvalidArgumentException("Invalid amount paid: {$amountPaid}");
            // }

            $customer = $this->findCustomerOrFail($customerId);
            $message = $this->buildPaymentMessage($customer, $amountPaid);

            return $this->messagingService->send(
                $customer->phone,
                $message
            );

        } catch (ModelNotFoundException $e) {

            Log::warning('Payment Alert failed: ' . $e->getMessage(), [
                'customer_id' => $customerId,
                'amount_paid' => $amountPaid
            ]);

            return false;

        } catch (\Exception $e) {

            Log::warning('Payment Alert failed: ' . $e->getMessage(), [
                'customer_id' => $customerId,
                'amount_paid' => $amountPaid
            ]);

            return false;
        }
    }



    protected function findCustomerOrFail(string $customerId): Customer
    {
        $customer = Customer::where('customer_id', $customerId)->first();

        if (!$customer) {
            throw new ModelNotFoundException("Customer with ID {$customerId} not found.");
        }

        return $customer;
    }


    protected function buildPaymentMessage(Customer $customer, float $amountPaid): string
    {
        $companyName = $this->getCompanyName();
        $formattedAmount = $this->formatCurrency($amountPaid);
        $formattedBalance = $this->formatCurrency($customer->balance) ?? 0.00;

        return sprintf(
            "Your payment of GHS %s to %s was successful. Your balance is GHS %s",
            $formattedAmount,
            $companyName,
            $formattedBalance
        );
    }

    protected function getCompanyName(): string
    {
        return Auth::user()->company->company_name ?? config('app.name');
    }

    protected function formatCurrency(float|int $amount): string
    {
        return number_format($amount, 2);
    }
}
