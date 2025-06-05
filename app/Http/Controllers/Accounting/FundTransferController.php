<?php

namespace App\Http\Controllers\Accounting;

use App\Traits\HandleResourceActions;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Accounting\FundTransfer;
use App\Models\Accounting\OperatingAccount;
use App\Http\Controllers\OperatingAccountController;
use App\Http\Requests\Transfers\StoreNewTransferRequest;
use App\Services\Accounting\AccountService;
use App\Services\Accounting\FundTransferService;

class FundTransferController extends Controller
{
    use HandleResourceActions;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected $model = new FundTransfer(),
        private $modelName = 'Fund Transfer',
        private $accountService = new AccountService(),
        private $fundTransferService = new FundTransferService()
    )
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $all_transfers = $this->fundTransferService->getTransfers();
        $all_accounts = $this->accountService->getAssetAccounts();
        $transferStatistics = $this->fundTransferService->getTransferStatistics();

        return view('app.fund-transfers.fund-transfers', [
            'all_transfers' => $all_transfers,
            'all_accounts' => $all_accounts,
            'transferStatistics' => $transferStatistics
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewTransferRequest $request)
    {
        $data = $request->validated();
        return $this->handleStore($data);
    }



    /**
     * Display the specified resource.
     */
    public function show($transfer_id)
    {
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FundTransfer $fundTransfer)
    {
        $all_accounts = $this->accountService->getAssetAccounts();

        return view('app.fund-transfers.modals.edit-fundtransfer', [
            'fundTransfer' => $fundTransfer,
            'all_accounts' => $all_accounts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewTransferRequest $request, FundTransfer $fundTransfer)
    {
        return $this->handleUpdate($request, $fundTransfer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundTransfer $fundTransfer)
    {
       return $this->handleDelete($fundTransfer);
    }

    public function filterTransfers(Request $request)
    {
        
    }


    private function getTotalTransfer()
    {
        $today = Carbon::now();
        $weekStart = $today->copy()->startOfWeek();
        $monthStart = $today->copy()->startOfMonth();
        $yearStart = $today->copy()->startOfYear();

        return $transferSummary = [
            'today' => $this->totalTransferPeriod($today),
            'week' => $this->totalTransferPeriod($weekStart, $today),
            'month' => $this->totalTransferPeriod($monthStart, $today),
            'year' => $this->totalTransferPeriod($yearStart, $today),
        ];
    }

    private function totalTransferPeriod(DateTimeInterface $start, DateTimeInterface $end=null)
    {
        $query = FundTransfer::whereStatus('active');

        if (isset($end)) {
            $query->whereBetween('date', [$start, $end]);
        } else {
            $query->where('date', $start->format('Y-m-d'));
        }

        return number_format($query->sum('amount'),2);
    }
}
