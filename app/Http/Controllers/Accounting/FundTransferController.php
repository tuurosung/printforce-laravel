<?php

namespace App\Http\Controllers\Accounting;

use Carbon\Carbon;
use DateTimeInterface;
use App\Models\FundTransfer;
use Illuminate\Http\Request;
use App\Models\OperatingAccount;
use Illuminate\Routing\Controller;
use App\Http\Controllers\OperatingAccountController;

class FundTransferController extends Controller
{
    private $active_subscriber = '187635294';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $all_transfers = $this->getTransfers();
        $all_accounts = OperatingAccount::filterByType(1);
        $transferSummary = $this->getTotalTransfer();

        return view('app.fund-transfers.fund-transfers', compact('all_transfers', 'all_accounts', 'transferSummary'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required',
            'date' => 'required',
            'source_account' => 'required',
            'destination_account' => 'required',
            'notes' => 'required'
        ]);

        // avoid transfer to the same account
        if ($data['source_account'] === $data['destination_account']) {
            return redirect()->back()->with('error',"Errrmmm, You cannot transfer funds into the same account");
        }

        $is_transferred = FundTransfer::create($data);

        return $is_transferred
            ? redirect()->back()->with('success', "Bingo! Transfer created successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");
    }



    /**
     * Display the specified resource.
     */
    public function show($transfer_id)
    {
        //get transfer id
        // $transfer = $this->findTransfer($transfer_id);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $transfer_id)
    {
        $fundTransfer = FundTransfer::find($transfer_id);

        if (is_null($fundTransfer)) {
            return abort(404);
        }

        $all_accounts = OperatingAccount::filterByType(1);

        return view('app.fund-transfers.modals.edit-fundtransfer', compact('fundTransfer', 'all_accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'transfer_id' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'source_account' => 'required',
            'destination_account' => 'required',
            'notes' => 'required'
        ]);

        $fundTransfer = FundTransfer::find($data['transfer_id']);

        // avoid transfer to the same account
        if ($data['source_account'] === $data['destination_account']) {
            return redirect()->back()->with('error', "Errrmmm, You cannot transfer funds into the same account");
        }

        $is_updated = $fundTransfer->update($data);

        return $is_updated
            ? redirect()->back()->with('success', "Bingo! Transfer updated successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $transfer_id)
    {
        // find the given transfer
        $transfer = FundTransfer::find($transfer_id);

        $is_deleted = $transfer->status = 'deleted';

        return $is_deleted
            ? redirect()->back()->with('success', "Bingo! Transfer deleted successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");

    }

    public function filterTransfers(Request $request)
    {
        $data = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        $filteredTransfers = FundTransfer::whereBetween('date', [$start_date, $end_date])
            ->get();


        return view('app.fund-transfers.filter-transfers', compact('filteredTransfers'));
    }



    public function findTransfer($transfer_id)
    {
        return FundTransfer::whereTransferId($transfer_id)
        ->whereSubscriberId($this->active_subscriber)->whereStatus('active')->first();
    }

    public function getTransfers()
    {
        return FundTransfer::whereSubscriberId($this->active_subscriber)
            ->whereStatus('active')
            ->orderBy('sn', 'desc')
            ->get();
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
        $query = FundTransfer::whereSubscriberId($this->active_subscriber)->whereStatus('active');

        if (isset($end)) {
            $query->whereBetween('date', [$start, $end]);
        } else {
            $query->where('date', $start->format('Y-m-d'));
        }

        return number_format($query->sum('amount'),2);
    }
}
