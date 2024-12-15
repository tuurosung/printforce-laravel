<?php

namespace App\Models;

use App\Models\Subscribers;
use App\Traits\ScopedActive;
use App\Traits\ScopedToSubscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customers\CustomerPayment;
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

    protected $active_subscriber = '187635294';

    public function accountHeader()
    {
        return $this->belongsTo(OperatingAccountHeader::class, 'account_header');
    }

    /**
     * Define the relationship between accounts and payments using account_number
     *
     * @return void
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
    public function totalPayments()
    {
        return $this->payments()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount_paid');
    }

    /**
     * Defines the relationship between account number and added funds
     *
     * @return void
     */
    public function addFunds()
    {
        return $this->hasMany(AddFunds::class, 'account_number');
    }

    /**
     * Returns the total amount added into accounts using add funds feature.
     *
     * @return void
     */
    public function totalFundsAdded()
    {
        return $this->addFunds()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount');
    }

    public function expenditure()
    {
        return $this->hasMany(Expenditure::class, 'account_number');
    }

    public function totalExpenditure()
    {
        return $this->expenditure()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount');
    }

    public function receivedFunds()
    {
        return $this->hasMany(FundTransfer::class, 'destination_account');
    }

    public function totalReceivedFunds()
    {
        return $this->receivedFunds()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount');
    }

    public function transferredFunds()
    {
        return $this->hasMany(FundTransfer::class, 'source_account');
    }

    public function totalTransferredFunds()
    {
        return $this->transferredFunds()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount');
    }

    public function purchasePayments()
    {
        return $this->hasMany(PurchasePayment::class, 'account_number');
    }

    public function totalPurchasePayments()
    {
        return $this->purchasePayments()->where('subscriber_id', $this->active_subscriber)->where('status', 'active')->sum('amount_paid');
    }

    public function totalCredit()
    {
       $credit = $this->totalFundsAdded() + $this->totalReceivedFunds();
       return $credit;
    }

    public function totalDebit()
    {
        $debit = $this->totalPayments() + $this->totalExpenditure() + $this->totalTransferredFunds() + $this->totalPurchasePayments();
        return $debit;
    }


    public function acc_balance()
    {
        $balance = $this->totalCredit() - $this->totalDebit();
        return $balance;
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

}
