<?php

namespace App\Http\Controllers;

use App\Models\AddFunds;
use App\Models\Expenditure;
use App\Models\FundTransfer;
use Illuminate\Http\Request;
use App\Models\CustomerPayment;
use App\Models\PurchasePayment;
use App\Models\OperatingAccount;
use App\Models\OperatingAccountTypes;
use App\Models\Subscribers;

class OperatingAccountController extends Controller
{

    private $active_subscriber = '187635294';

    /**
     * Display a listing of the resource.
     */
    public function index(Subscribers $subscriber)
    {
        $account_types = OperatingAccountTypes::with(['headers.accounts' => function($query) {
            $query->whereStatus('active')->whereSubscriberId($this->active_subscriber);
        }])->get();

        $data = [
            'account_types' => $account_types
        ];

        return view('Admin.accounts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $account_headers = OperatingAccountHeaderController::allHeaders();

        $data = [
            'account_headers' => $account_headers
        ];

        return view('Admin.accounts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OperatingAccount $operatingAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OperatingAccount $operatingAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OperatingAccount $operatingAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperatingAccount $operatingAccount)
    {
        //
    }


    public function allAccounts()
    {
        return OperatingAccount::whereSubscriberId($this->active_subscriber)
            ->whereStatus('active')->get();
    }



    function AccountSummary($account_number)
    {
        // get the sum of all added funds
        $total_funds = AddFunds::where([
            ['account_number', $account_number],
            ['subscriber_id', $this->active_subscriber],
            ['status', 'active']
        ])->sum('amount');

        // get the sum of all payments made into the account
        $total_payments = CustomerPayment::where([
            ['account_number', $this->account_number],
            ['subscriber_id', $this->active_subscriber],
            ['status', 'active']
        ])->sum('amount_paid');

        // get the sum of all expenses made from the account
        $total_expenditure = Expenditure::where([
            ['account_number', $this->account_number],
            ['subscriber_id', $this->active_subscriber],
            ['status', 'active']
        ])->sum('amount');

        // get the sum of all transfers made out of the account
        $this->total_transfers = FundTransfer::where([
            ['source_account', $this->account_number],
            ['subscriber_id', $this->active_subscriber],
            ['status', 'active']
        ])->sum('amount');

        // get the sum of all transfers made into the account
        $total_transfers_received = FundTransfer::where([
            ['destination_account', $this->account_number],
            ['subscriber_id', $this->active_subscriber],
            ['status', 'active']
        ])->sum('amount');

        // get the sum of all payments made to suppliers from the account
        $total_supply_pmt = PurchasePayment::where([
            ['account_number', $this->account_number],
            ['subscriber_id', $this->active_subscriber],
            ['status', 'active']
        ])->sum('amount_paid');

        return $total_funds + $total_payments + $total_transfers_received - $total_expenditure - $total_transfers - $total_supply_pmt;
    }

    // function AccountSummary()
    // {
    //     // get the sum of all added funds
    //     $this->total_funds = AddFund::where('account_number', $this->account_number)
    //         ->where('subscriber_id', $this->active_subscriber)
    //         ->where('status', 'active')
    //         ->sum('amount');

    //     // get the sum of all payments made into the account
    //     $this->total_payments = Payment::where('account_number', $this->account_number)
    //     ->where('subscriber_id', $this->active_subscriber)
    //     ->where('status', 'active')
    //     ->sum('amount_paid');

    //     // get the sum of all expenses made from the account
    //     $this->total_expenditure = Expenditure::where('account_number', $this->account_number)
    //     ->where('subscriber_id', $this->active_subscriber)
    //     ->where('status', 'active')
    //     ->sum('amount');

    //     // get the sum of all transfers made out of the account
    //     $this->total_transfers = FundTransfer::where('source_account', $this->account_number)
    //     ->where('subscriber_id', $this->active_subscriber)
    //     ->where('status', 'active')
    //     ->sum('amount');

    //     // get the sum of all transfers made into the account
    //     $this->total_transfers_received = FundTransfer::where('destination_account', $this->account_number)
    //     ->where('subscriber_id', $this->active_subscriber)
    //     ->where('status', 'active')
    //     ->sum('amount');

    //     // get the sum of all payments made to suppliers from the account
    //     $this->total_supply_pmt = PurchasePayment::where('account_number', $this->account_number)
    //     ->where('subscriber_id', $this->active_subscriber)
    //     ->where('status', 'active')
    //     ->sum('amount_paid');

    //     $this->account_balance = $this->total_funds + $this->total_payments + $this->total_transfers_received - $this->total_expenditure - $this->total_transfers - $this->total_supply_pmt;
    // }

//     $totalPayments = Payment::whereHas('account', function ($query) {
//     $query->where('account_number', 'your_account_number_here');
// })->whereHas('subscriber', function ($query) {
//     $query->where('id', 'your_subscriber_id_here');
// })->sum('amount');




}
