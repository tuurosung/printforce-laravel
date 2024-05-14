<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\CustomerPayment;
use App\Models\OperatingAccount;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

class CustomerPaymentController extends Controller
{

    private $active_subscriber = '187635294';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;

        $data = [
            'i' => $i,
            'customer_id' => 'all',
            'all_payments' => $this->getAllPayments(),
            'all_customers' => $this->getAllCustomers(),
            'todays_total_payment' => $this->getTotalPayment('today'),
            'weeks_total_payment' => $this->getTotalPayment('week'),
            'months_total_payment' => $this->getTotalPayment('month'),
            'years_total_payment' => $this->getTotalPayment('year')
        ];

        return view('Admin.payments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($customer_id)
    {
        $all_customers = Customer::all()->where('status', 'active');
        $operating_accounts = OperatingAccount::all()->where('status', 'active');

        $data = [
            'customer_id' => $customer_id,
            'all_customers' => $all_customers,
            'operating_accounts' => $operating_accounts
        ];

        return view('Admin.payments.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $payment = new CustomerPayment();

        $payment->subscriber_id = $this->active_subscriber;
        $payment->payment_id = $this->paymentId();
        $payment->customer_id = $request->customer_id;
        $payment->amount_paid = $request->amount_paid;
        $payment->payment_date = $request->date;
        $payment->account_number = $request->account_number;

        try {
            // Save Payment to database
            $payment->save();
            return redirect()->back()->with('success', "Payment recorded successfully");
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Ooops! Something went wrong on our side'.$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerPayment $customerPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($payment_id)
    {
        if (!$this->isPayment($payment_id)) {
            return redirect()->back()->with('error', "Invalid payment id");
        }

        $payment = CustomerPayment::find($payment_id);
        $all_customers = Customer::all()->where('status', 'active');
        $operating_accounts = OperatingAccount::all()->where('status','active');

        $data = [
            'payment' => $payment,
            'all_customers' => $all_customers,
            'operating_accounts' => $operating_accounts
        ];

        return view('Admin.payments.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // validate request
        $this->validateRequest($request);

        if (!$this->isPayment($request->payment_id)) {
            return redirect()->back()->with('error', "Invalid payment id");
        }

        $payment = CustomerPayment::find($request->payment_id);

        $payment->customer_id = $request->customer_id;
        $payment->amount_paid = $request->amount_paid;
        $payment->payment_date = $request->date;
        $payment->account_number = $request->account_number;

        try {
            $payment->save();
            return redirect()->back()->with('success', "Payment information updated successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Something went wrong on our side". $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($payment_id)
    {
        // VerifyCsrfToken
        $payment = CustomerPayment::find($payment_id);

        $payment->status = 'deleted';

        try {
            $payment->save();
            session('success', 'Payment deleted successfully');
            return redirect()->back()->with('success', 'Payment deleted successfully');
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            session('error', 'Ooops! We could not delete the given payment');
            return  redirect()->back()->with('error', 'Ooops! We could not delete the given payment');
        }

    }

    private function isPayment($payment_id)
    {
        return (bool) CustomerPayment::find($payment_id);
    }

    private function validateRequest($request)
    {
        return $request->validate([

            'amount_paid' => 'required|numeric',
            'customer_id' => 'required',
            'date' => 'required',
            'account_number' => 'required'

        ]);

    }

    private function paymentId()
    {
        $count =  CustomerPayment::count() + 1;
        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }

    private function getAllPayments()
    {
        return CustomerPayment::all()
            ->where('status', 'active')
            ->where('subscriber_id', $this->active_subscriber)
            ->sort();
    }

    public function filterPayments(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'customer_id' => 'required'
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;


        if ($request->customer_id == 'all') {

            $filteredList =  CustomerPayment::whereBetween('payment_date', [$start_date, $end_date])
                ->where('subscriber_id', $this->active_subscriber)
                ->where('status', 'active')->get();
        } else {

            $filteredList =  CustomerPayment::whereBetween('payment_date', [$start_date, $end_date])
                ->where('customer_id', $request->customer_id)
                ->where('subscriber_id', $this->active_subscriber)
                ->where('status', 'active')->get();
        }

        $i = 1;
        $data = [
            'i' => $i,
            'all_payments' => $filteredList
        ];

        return view('Admin.payments._filtered-list', $data);
    }

    /**
     * Return all active customers
     *
     * @return void
     */
    private function getAllCustomers()
    {
        return Customer::all()
            ->where('status', 'active')
            ->where('subscriber_id', $this->active_subscriber);
    }

    /**
     * Return the total payment made for a given period
     *
     * @param string $period
     * @return float $totalPayment
     */
    private function getTotalPayment($period)
    {
        switch ($period) {
            case 'today':
                $totalPayment =  CustomerPayment::totalPaymentPeriod(Carbon::now()->today(), Carbon::now()->today());
                break;

            case 'week':
                $totalPayment =  CustomerPayment::totalPaymentPeriod(Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek());
                break;

            case 'month':
                $totalPayment =  CustomerPayment::totalPaymentPeriod(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
                break;

            case 'year':
                $totalPayment =  CustomerPayment::totalPaymentPeriod(Carbon::now()->startOfYear(), Carbon::now()->endOfYear());
                break;

            default:
                $totalPayment = 0;
                break;
        }

        return $totalPayment;
    }


}
