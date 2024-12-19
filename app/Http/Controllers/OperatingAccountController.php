<?php

namespace App\Http\Controllers;

use App\Models\AddFunds;
use App\Models\Expenditure;
use App\Models\Subscribers;
use App\Models\FundTransfer;
use Illuminate\Http\Request;
use App\Models\PurchasePayment;
use App\Models\OperatingAccount;
use App\Models\OperatingAccountTypes;
use App\Models\OperatingAccountHeader;
use App\Models\Customers\CustomerPayment;

class OperatingAccountController extends Controller
{

    private $active_subscriber = '187635294';

    /**
     * Display a listing of the resource.
     */
    public function index(Subscribers $subscriber)
    {
        $account_types = OperatingAccountTypes::getAccountTypes();

        $account_types = OperatingAccountTypes::with([
            'headers.accounts' => function ($query) {
                $query->with([
                    'payments',
                    'expenditure',
                    'receivedFunds',
                    'transferredFunds',
                    'purchasePayments'

                ]);
            }
        ])->get();
        // dd($account_headers);

        return view('app.accounts.accounts', compact('account_types', 'account_types'));
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
        $data = $request->validate([
            'account_header' => 'required',
            'account_name' => 'required',
            'description' => 'required',
        ]);

        $accountHeader = OperatingAccountHeader::find($data['account_header']);
        $data['acc_type'] = $accountHeader->type;

        // check if account name already exists
        $name_exists = OperatingAccount::where('account_name', $data['account_name'])->first();

        if ($name_exists) {
            return redirect()->back()->with('error', 'Account name already exists');
        }

        $create = OperatingAccount::create($data);

        return $create
            ? redirect()->back()->with('success', 'Account created successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
    }

    /**
     * Display the specified resource.
     */
    public function show(OperatingAccount $operatingAccount)
    {
        if (is_null($operatingAccount)) {
            return redirect()->back()->with('error', 'Account not found');
        }

        return view('app.accounts.account-transactions', compact('operatingAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $account_number)
    {
        $operatingAccount = OperatingAccount::find($account_number);

        if (is_null($operatingAccount)) {
            return abort(404);
        }

        $account_types = OperatingAccountTypes::getAccountTypes();

        return view('app.accounts.modals.edit-account', compact('operatingAccount', 'account_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $operatingAccount = OperatingAccount::find($request->account_number);

        if (is_null($operatingAccount)) {
            return redirect()->back()->with('error', 'Account not found');
        }

        $data = $request->validate([
            'account_header' => 'required',
            'account_name' => 'required',
            'description' => 'required',
        ]);

        $accountHeader = OperatingAccountHeader::find($data['account_header']);

        $data['acc_type'] = $accountHeader->type;

        $update = $operatingAccount->update($data);

        return $update
            ? redirect()->back()->with('success', 'Account updated successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperatingAccount $operatingAccount)
    {
        if (is_null($operatingAccount)) {
            return redirect()->back()->with('error', 'Account not found');
        }

        // check if account has any payments
        $has_payments = $operatingAccount->payments->count() > 0;

        if ($has_payments) {
            return redirect()->back()->with('error', 'Account has payments and cannot be deleted');
        }

        $is_deleted = $operatingAccount->delete();

        return $is_deleted
            ? redirect()->back()->with('success', 'Account deleted successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
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
