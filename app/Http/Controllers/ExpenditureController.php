<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Expenditure;
use App\Models\ExpenditureHeader;
use App\Models\OperatingAccount;
use DateTimeInterface;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{

    private $active_subscriber = '187635294';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $today = Carbon::now();
        $all_accounts = $this->getAllAccounts();
        $expenditure_headers = $this->getExpenditureHeaders();
        $total_expenditure = Expenditure::where('subscriber_id', $this->active_subscriber)->sum('amount');

        $all_expenses = Expenditure::where('date', $today->format('Y-m-d'))->whereStatus('active')->whereSubscriberId($this->active_subscriber)->orderBy('sn', 'desc')->get();

        $data = [
            'i' => $i,
            'today' => $today->format('Y-m-d'),
            'all_expenses' => $all_expenses,
            'all_accounts' => $all_accounts,
            'total_expenditure' => $total_expenditure,
            'expenditure_headers' => $expenditure_headers,
            'expenditure_by_period' => $this->getExpenditureTotalByPeriod()
        ];

        return view('Admin.expenditure.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $this->validateRequest($request);

        $expenditure_id = $this->expenditureId();

        $createData = [
            'subscriber_id' => $this->active_subscriber,
            'expenditure_id' => $expenditure_id,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
            'header_id' => $request->header_id,
            'account_number' => $request->account_number
        ];

        try {
            Expenditure::create($createData);
            return redirect()->back()->with('success', "Bingo! Expenditure saved successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side".$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Expenditure $expenditure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($expenditure_id)
    {
        //handle wrong expenditure ids
        if (!$this->isExpenditure($expenditure_id)) {
            return redirect()->route('all.expenses');
        }

        $expenditure_headers = $this->getExpenditureHeaders();
        $all_accounts = $this->getAllAccounts();
        $expenditure = $this->getExpenditure($expenditure_id);

        $data = [
            'expenditure' => $expenditure,
            'all_accounts' => $all_accounts,
            'expenditure_headers' => $expenditure_headers
        ];

        return view('Admin.expenditure.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expenditure $expenditure)
    {
        $expenditure_id = $request->expenditure_id;

        // validate expenditure id
        if (!$this->isExpenditure($expenditure_id)) {
            return redirect()->route('all.expenses');
        }

        // validate request
        $this->validateRequest($request);

        $expenditure = Expenditure::whereExpenditureId($expenditure_id)->whereSubscriberId($this->active_subscriber)->whereStatus('active')->first();

        $expenditure->subscriber_id = $this->active_subscriber;
        $expenditure->expenditure_id = $expenditure_id;
        $expenditure->amount = $request->amount;
        $expenditure->date = $request->date;
        $expenditure->description = $request->description;
        $expenditure->header_id = $request->header_id;
        $expenditure->account_number = $request->account_number;

        try {
            $expenditure->save();
            return redirect()->back()->with('success', "Bingo! Expenditure updated successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side" . $e->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($expenditure_id)
    {
        // VerifyCsrfToken

        $expenditure = $this->getExpenditure($expenditure_id);
        $expenditure->status = 'deleted';

        try {
            $expenditure->save();
            return redirect()->back()->with('success', 'Bingo! Expenditure deleted successfully');
        } catch (\Exception $e) {
            return  redirect()->back()->with('error', 'Ooops! We could not delete the given expenditure');
        }
    }

    public function filterExpenditure(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required'
            // 'account_number' => 'required'
        ]);

        $start = $request->start_date;
        $end = $request->end_date;

        $filteredList = Expenditure::whereBetween('date', [$start, $end])
            ->whereStatus('active')
            ->whereSubscriberId($this->active_subscriber)
            ->get();

        $i = 1;

        $data = [
            'i' => $i,
            'all_expenses' => $filteredList
        ];

        return view('Admin.expenditure._filter', $data);
    }

    /**
     * Function that creates a unique id for an expenditure
     *
     * @return string
     */
    private function expenditureId()
    {
        $count = Expenditure::whereSubscriberId($this->active_subscriber)->count() + 1;
        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }

    private function isExpenditure(string $expenditure_id) : bool
    {
        return (bool) Expenditure::whereExpenditureId($expenditure_id)->whereSubscriberId($this->active_subscriber)->whereStatus('active')->first();
    }

    private function validateRequest($request)
    {
        $request->validate([
            'amount' => 'required',
            'date' => 'required',
            'description' => 'required',
            'header_id' => 'required',
            'account_number' => 'required'
        ]);
    }

    private function getTotalExpenditure(DateTimeInterface $start, DateTimeInterface $end=null)
    {
        $query = Expenditure::whereSubscriberId($this->active_subscriber)->whereStatus('active');

        if (isset($end)) {
            $query->whereBetween('date', [$start, $end]);
        } else {
            $query->whereDate('date', $start->format('Y-m-d'));
        }

        return number_format($query->sum('amount'),2);
    }

    private function getExpenditureTotalByPeriod()
    {
        $today = Carbon::now();
        $beginingOfWeek = $today->copy()->startOfWeek();
        $beginingOfMonth = $today->copy()->startOfMonth();
        $beginingOfYear = $today->copy()->startOfYear();

        return [
            'today' => $this->getTotalExpenditure($today),
            'week' => $this->getTotalExpenditure($beginingOfWeek, $today),
            'month' => $this->getTotalExpenditure($beginingOfMonth, $today),
            'year' => $this->getTotalExpenditure($beginingOfYear, $today)
        ];
    }

    private function getExpenditure($expenditure_id)
    {
        return Expenditure::whereExpenditureId($expenditure_id)
            ->whereSubscriberId($this->active_subscriber)
            ->whereStatus('active')
            ->first();
    }

    private function getAllAccounts()
    {
        return OperatingAccount::whereSubscriberId($this->active_subscriber)
        ->whereStatus('active')->get();
    }

    private function getExpenditureHeaders()
    {
        return ExpenditureHeader::whereSubscriberId($this->active_subscriber)->whereStatus('active')->get();
    }
}
