<?php

namespace App\Models\Accounting;

use App\Models\Subscribers;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use App\Models\Accounting\AddFunds;
use Illuminate\Support\Facades\Auth;
use App\Models\OperatingAccountHeader;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customers\CustomerPayment;
use App\Models\Purchases\PurchasePayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperatingAccount extends Model
{

    use HasFactory;
    use ScopedActive;
    use ScopedToSubscriber;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($account) {
            $account->account_number = self::generateAccountNumber();
            $account->subscriber_id = Auth::user()->subscriber_id;
        });
    }

    protected $table = 'all_accounts';
    protected $primaryKey = 'account_number';
    public $incrementing = false;

    protected $fillable = [
        'subscriber_id',
        'account_number',
        'account_header',
        'account_name',
        'account_type',
        'description'
    ];

    

    public function accountHeader()
    {
        return $this->belongsTo(OperatingAccountHeader::class, 'account_header');
    }

    /**
     * Define the relationship between accounts and payments using account_number
     *
     * @return mixed
     */
    public function payments()
    {
        return $this->hasMany(CustomerPayment::class, 'account_number');
    }

    /**
     * returns the sum of all payments made into this account
     *
     * @return void
     */
    public function getTotalPaymentsAttribute()
    {
        return $this->payments->sum('amount_paid');
        // return $this->payments()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount_paid');
    }



    /**
     * Defines the relationship between account number and added funds
     *
     * @return mixed
     */
    public function addedFunds()
    {
        return $this->hasMany(AddFunds::class, 'account_number');
    }

    /**
     * Returns the total amount added into accounts using add funds feature.
     *
     * @return void
     */
    public function getTotalFundsAddedAttribute()
    {
        return $this->addedFunds->sum('amount');
        // return $this->addFunds()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount');
    }


    /**
     * Define the relationship between account number and received funds
     * @return mixed
     */
    public function receivedFunds()
    {
        return $this->hasMany(FundTransfer::class, 'destination_account');
    }



    public function getTotalReceivedFundsAttribute()
    {
        return $this->receivedFunds->sum('amount');
        // return $this->receivedFunds()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount');
    }



    public function expenditure()
    {
        return $this->hasMany(Expenditure::class, 'account_number');
    }



    public function getTotalExpenditureAttribute()
    {
        return $this->expenditure->sum('amount');
        // return $this->expenditure()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount');
    }


    /**
     * Define the relationship between account number and transferred funds
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transferredFunds()
    {
        return $this->hasMany(FundTransfer::class, 'source_account');
    }

    public function getTotalTransferredFundsAttribute()
    {
        return $this->transferredFunds->sum('amount');
        // return $this->transferredFunds()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount');
    }


    /**
     * Define the relationship between account number and purchase payments
     *
     * @return mixed
     */
    public function purchasePayments()
    {
        return $this->hasMany(PurchasePayment::class, 'account_number');
    }



    public function getTotalPurchasePaymentsAttribute()
    {
        return $this->purchasePayments->sum('amount_paid');
        // return $this->purchasePayments()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount_paid');
    }

    public function getTotalCreditAttribute()
    {
        return collect([
            $this->total_funds_added,
            $this->total_received_funds
        ])->sum();

    //    $credit = $this->totalFundsAdded() + $this->totalReceivedFunds();
    //    return $credit;
    }

    public function getTotalDebitAttribute()
    {
        return collect([
            $this->total_payments,
            $this->total_expenditure,
            $this->total_transferred_funds,
            $this->total_purchase_payments
        ])->sum();

        // $debit = $this->totalPayments() + $this->totalExpenditure() + $this->totalTransferredFunds() + $this->totalPurchasePayments();
        // return $debit;
    }


    public function getAccountBalanceAttribute()
    {
        return $this->total_credit - $this->total_debit;
    }


    public static function filterByType($account_type)
    {
        return self::where('acc_type', $account_type)->get();
    }

    private static function generateAccountNumber()
    {
        $count = OperatingAccount::count() + 1;
        return 1000000 + $count;
    }

    public function getAccountHistoryAttribute()
    {
        $accountHistory = [];

        // Get payments
        $payments = $this->payments;
        foreach ($payments as $payment) {
            $accountHistory[] = [
                'date' => $payment->created_at === null || $payment->created_at === '' ? $payment->date : $payment->created_at,
                'transaction_id' => $payment->payment_id,
                'type' => 'Payment',
                'amount' => $payment->amount_paid,
                'description' => $payment->description,
                'transaction_type' => 'credit',
            ];
        }

        // Get expenditures
        $expenditures = $this->expenditure;
        foreach ($expenditures as $expenditure) {
            $accountHistory[] = [
                'date' => $expenditure->created_at,
                'transaction_id' => $expenditure->expenditure_id,
                'type' => 'Expenditure',
                'amount' => $expenditure->amount,
                'description' => $expenditure->description,
                'transaction_type' => 'debit',
            ];
        }

        // Get purchase payments
        $purchasePayments = $this->purchasePayments;
        foreach ($purchasePayments as $purchasePayment) {
            $accountHistory[] = [
                'date' => $purchasePayment->created_at,
                'transaction_id' => $purchasePayment->payment_id,
                'type' => 'Purchase Payment',
                'amount' => $purchasePayment->amount,
                'description' => $purchasePayment->description,
                'transaction_type' => 'debit',
            ];
        }

        // Get inbound transfers
        $inboundTransfers = $this->receivedFunds;
        foreach ($inboundTransfers as $inboundTransfer) {
            $accountHistory[] = [
                'date' => $inboundTransfer->created_at,
                'transaction_id' => $inboundTransfer->transfer_id,
                'type' => 'Inbound Transfer',
                'amount' => $inboundTransfer->amount,
                'description' => $inboundTransfer->description,
                'transaction_type' => 'credit',
            ];
        }

        // Get outbound transfers
        $outboundTransfers = $this->transferredFunds;
        foreach ($outboundTransfers as $outboundTransfer) {
            $accountHistory[] = [
                'date' => $outboundTransfer->created_at,
                'transaction_id' => $outboundTransfer->transfer_id,
                'type' => 'Outbound Transfer',
                'amount' => $outboundTransfer->amount,
                'description' => $outboundTransfer->description,
                'transaction_type' => 'debit',
            ];
        }

        // Sort account history by date
        usort($accountHistory, function ($a, $b) {
            return $a['date'] <=> $b['date'];
        });

        return $accountHistory;
    }

}
