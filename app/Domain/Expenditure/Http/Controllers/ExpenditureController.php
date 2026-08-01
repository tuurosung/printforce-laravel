<?php

declare(strict_types=1);

namespace App\Domain\Expenditure\Http\Controllers;

use App\Domain\Expenditure\Http\Requests\StoreNewExpenditureRequest;
use App\Domain\Expenditure\Models\Expenditure;
use App\Domain\Expenditure\Services\ExpenditureService;
use App\Http\Controllers\Controller;
use App\Models\Accounting\ExpenditureHeader;
use App\Services\Accounting\AccountService;
use App\Traits\HandleResourceActions;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{

    /**
     * Create a new class instance.
     */
    public function __construct(
        private AccountService $accountService,
        private readonly ExpenditureService $expenditureService
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $all_accounts = $this->operatingAccountService->getAssetAccounts();
        // $expenditure_headers = $this->expenditureService->getHeadersArray();

        // $expenditure_statistics = $this->expenditureService->statistics;


        // $total_expenditure = $expenditure_statistics['total_expenditure'];
        // $monthly_expenditure = $expenditure_statistics['monthly_expenditure'];
        // $yearly_expenditure = $expenditure_statistics['yearly_expenditure'];

        // $all_expenses = Expenditure::with(['header', 'account'])->orderBy('sn', 'desc')->get();

        return view('app.expenditure.expenses', [
            'all_accounts' => [],
            'expenditure_headers' => [],
            'total_expenditure' => 0,
            'monthly_expenditure' => 0,
            'yearly_expenditure' => 0,
            'all_expenses' => $this->expenditureService->getExpenses()
        ]);
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
    public function store(StoreNewExpenditureRequest $request)
    {
        // dd($request->toData());
        $this->expenditureService->createExpenditure($request->toData());
        return redirect()->back()->with("success", "Expenditure recorded successfully");
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
    public function edit(Expenditure $expenditure)
    {
        // $all_accounts = $this->operatingAccountService->getAssetAccounts();
        // $expenditure_headers = $this->expenditureService->getHeadersArray();

        return view('app.expenditure.modals.edit-expense-modal', [
            'expenditure' => $expenditure,
            'expenditure_headers' => [],
            'all_accounts' => []
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewExpenditureRequest $request, Expenditure $expenditure)
    {
        return $this->handleUpdate($request, $expenditure);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expenditure $expenditure)
    {
       return $this->handleDelete($expenditure);
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

}
