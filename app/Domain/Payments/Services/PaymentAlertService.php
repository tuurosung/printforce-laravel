<?php

namespace App\Domain\Payments\Services;

use App\Domain\Customers\Services\CustomerService;
use App\Domain\Payments\Contracts\PaymentAlertInterface;
use App\Models\Customers\Customer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MessagingController;
use App\Services\Alerts\MessagingService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

class PaymentAlertService implements PaymentAlertInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private CustomerService $customerService,
        protected $messagingService = new MessagingService()
    ){}


    public function send(string $customerId, float $amountPaid): bool
    {
        try {

            $customer = $this->customerService->findCustomer($customerId);
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


    public function buildPaymentMessage(Customer $customer, float $amountPaid): string
    {
        $companyName = Auth::user()->company->company_name ?? config('app.name');
        $formattedAmount = number_format($amountPaid,2);
        $formattedBalance = number_format($customer->balance, 2);

        return sprintf(
            "Your payment of GHS %s to %s was successful. Your balance is GHS %s",
            $formattedAmount,
            $companyName,
            $formattedBalance
        );
    }
}
