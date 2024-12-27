<?php

namespace App\Http\Controllers\Accounting;


use Carbon\Carbon;
use DateTimeInterface;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use App\Models\OperatingAccount;
use App\Models\ExpenditureHeader;
use App\Http\Controllers\Controller;

class ExpenditureController extends Controller
{

    private $active_subscriber = '187635294';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_accounts = OperatingAccount::filterByType(1);
        $expenditure_by_period = Expenditure::getExpenditureByPeriod();
        $expenditure_headers = ExpenditureHeader::getExpenditureHeaders();
        $total_expenditure = Expenditure::sum('amount');

        $all_expenses = Expenditure::with(['header', 'account'])->orderBy('sn', 'desc')->get();

        return view('app.expenditure.expenses', compact(['all_expenses', 'all_accounts', 'total_expenditure', 'expenditure_headers', 'expenditure_by_period']));
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
        $data = $this->validateRequest($request);

        $save_expenditure = Expenditure::create($data);

        return $save_expenditure
            ? redirect()->back()->with('success', 'Expenditure created successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
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
    public function edit(string $expenditure_id)
    {
        $expenditure = Expenditure::find($expenditure_id);

        if (is_null($expenditure)) {
            return abort(404);
        }

        $expenditure_headers = ExpenditureHeader::getExpenditureHeaders();
        $all_accounts = OperatingAccount::filterByType(1);

        return view('app.expenditure.modals.edit-expense-modal', compact(['expenditure', 'all_accounts', 'expenditure_headers']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expenditure $expenditure)
    {
        // validate request
        $data = $this->validateRequest($request);


        $expenditure = Expenditure::find($request->expenditure_id);

        if (is_null($expenditure)) {
            return redirect()->back()->with('error', 'Expenditure Not Found');
        }

        $updated = $expenditure->update($data);

        return $updated
            ? redirect()->back()->with('success', 'Expenditure updated successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $expenditure_id)
    {
        $expenditure = Expenditure::find($expenditure_id);

        if (is_null($expenditure)) {
            return redirect()->back()->with('error', 'Expenditure Not Found');
        }

        $deleted = $expenditure->delete();

        return $deleted
            ? redirect()->back()->with('success', 'Expenditure deleted successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');

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
            ->get();

        $i = 1;

        $data = [
            'i' => $i,
            'all_expenses' => $filteredList
        ];

        return view('Admin.expenditure._filter', $data);
    }



    private function validateRequest($request)
    {
        return $request->validate([
            'amount' => 'required',
            'date' => 'required',
            'description' => 'required',
            'header_id' => 'required',
            'account_number' => 'required'
        ]);
    }

}
