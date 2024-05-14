<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\LargeFormatJob;
use App\Models\CustomerPayment;
use App\Models\CustomerCategory;
use App\Models\CustomerInvoices;
use App\Models\DesignJob;
use App\Models\EmbroideryJob;
use App\Models\PressJob;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    private function customerId()
    {
        $count = Customer::where('subscriber_id', '187635294')->count();
        ++$count;
        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $total_jobs = 0;
        $total_payments = 0;
        $total_balance = 0;

        $list = Customer::all()->sortBy('name');
        $totalCustomerDebit = Customer::totalCustomerDebit();
        $totalCustomerCredit = Customer::totalCustomerCredit();
        $totalCustomerBalance = Customer::totalCustomerBalance();

        if ($totalCustomerBalance < 0) {
            $totalCustomerBalance = '('. number_format(abs($totalCustomerBalance),2) .')';
        } else {
            $totalCustomerBalance = number_format($totalCustomerBalance,2);
        }

        $data = [
            'i' => $i,
            'list' =>  $list,
            'total_jobs' => $total_jobs,
            'total_payments' => $total_payments,
            'total_balance' => $total_balance,
            'total_customer_debit' => number_format($totalCustomerDebit,2),
            'total_customer_credit' => number_format($totalCustomerCredit,2),
            'total_customer_balance' => $totalCustomerBalance
        ];

        return view('Admin.customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $i = 1;
        $categories = CustomerCategory::all();

        $data = [
            'i' => $i,
            'categories' => $categories
        ];

        return view('customer.new-customer', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'category' => 'required'
        ]);

        $customer = new Customer();

        $active_subscriber = '187635294';

        $customer->subscriber_id = $active_subscriber;
        $customer->customer_id = $this->customerId();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->category = $request->category;

        if ($customer->save()) {
            $_SESSION['hasMsg'] = true;
            return redirect()->back()->with('success', "Bingo! Customer created successsfully!");
        } else {
            $_SESSION['hasErr'] = true;
            return redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($customer_id)
    {
        if (!$this->isCustomer($customer_id)) {
            return redirect()->back()->with('error', 'Invalid customer id');
        }

        $i = 1;
        $total = 0;
        $customer = Customer::find($customer_id); //find customer using id, later we'll chain the subscriber id to the find query
        $customer_payments = CustomerPayment::where('customer_id', $customer_id);
        $customer_invoices = CustomerInvoices::where('customer_id', $customer_id);

        $largeFormatJobs = LargeFormatJob::where('customer_id', $customer_id);
        $embroideryJobs = EmbroideryJob::where('customer_id', $customer_id);

        $customer_jobs = [];

        foreach ($largeFormatJobs as $rows) {
            array_push($customer_jobs, $rows['job_id'], $rows['date'], $rows['service_id'], $rows['total']);
        }

        foreach ($embroideryJobs as $rows) {
            array_push($customer_jobs, $rows['job_id'], $rows['date'], $rows['service_id'], $rows['total']);
        }



        // $customer_jobs = LargeFormatJob::select('job_id', 'date', 'service_id', 'total')
        //                     ->where('status', 'active')
        //                     ->where('customer_id', $customer_id)->get()

        //                     ->union(
        //                         EmbroideryJob::select('job_id', 'service_id', 'total')
        //                         ->where('status', 'active')
        //                         ->where('customer_id', $customer_id)->get()
        //                     )

        //                     ->union(
        //                         DesignJob::select('job_id', 'date', 'service_id', 'total')
        //                         ->where('status', 'active')
        //                         ->where('customer_id', $customer_id)->get()
        //                     )

        //                     ->union(
        //                         PressJob::select('job_id', 'date', 'service_id', 'total')
        //                         ->where('status', 'active')
        //                         ->where('customer_id', $customer_id)->get()
        //                     )
        //                     ;

        $data = [
            'i' => $i,
            'customer' => $customer,
            'customer_jobs' => $customer_jobs,
            'customer_payments' => $customer_payments,
            'customer_invoices' => $customer_invoices,
            'total' => $total
        ];

        return view('Admin.customer.info', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($customer_id)
    {
        // check if customer id is belongs to a valid customer
        if (!$this->isCustomer($customer_id))
        {
            return redirect()->back()->with('ErrMsg', "Ooops! Not a valid customer id");
        }

        $customer = Customer::find($customer_id);
        $categories = CustomerCategory::all();

        $data = [
            'customer' => $customer,
            'categories' => $categories
        ];

        return view('Admin.customer.edit-customer', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'category' => 'required'
        ]);

        $customer = Customer::find($request->customer_id);

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->category = $request->category;

        if ($customer->save()) {
            return redirect()->back()->with('success', "Customer information updated successfully");
        } else {
            Log::error("Something went wrong");
            return redirect()->back()->with('error', "We could not update customer information at this time");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }


    private function isCustomer($customer_id)
    {
        return (bool) Customer::find($customer_id);
    }
}
