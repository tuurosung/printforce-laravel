<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTimeInterface;
use App\Models\FundTransfer;
use Illuminate\Http\Request;
use App\Http\Controllers\OperatingAccountController;
use App\Models\OperatingAccount;

class FundTransferController extends Controller
{
    private $active_subscriber = '187635294';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $i = 1;
        $all_transfers = $this->getTransfers();

        $data = [
            'i' => $i,
            'all_transfers' => $all_transfers,
            'transferSummary' => $this->getTotalTransfer()
        ];

        return view('Admin.transfers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $account = new OperatingAccountController();
        $all_accounts = $account->allAccounts();

        $data = [
            'all_accounts' => $all_accounts
        ];

        return view('Admin.transfers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        // avoid transfer to the same account
        if ($request->source === $request->destination) {
            return redirect()->back()->with('error',"Errrmmm, You cannot transfer funds into the same account");
        }

        $createData = [
            'subscriber_id' => $this->active_subscriber,
            'transfer_id' => $this->transferId(),
            'date' => $request->date,
            'amount' => $request->amount,
            'source_account' => $request->source,
            'destination_account' => $request->destination,
            'notes' => $request->notes,
        ];

        try {
            FundTransfer::create($createData);
            return redirect()->back()->with('success', "Bingo! Transfer created successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side".$e->getMessage());
        }
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
    public function edit($transfer_id)
    {
        $account = new OperatingAccountController();

        $transfer = $this->findTransfer($transfer_id);
        $all_accounts = $account->allAccounts();

        $data = [
            'transfer' => $transfer,
            'all_accounts' => $all_accounts
        ];

        return view('Admin.transfers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validateRequest($request);

        $transfer = $this->findTransfer($request->transfer_id);

        // avoid transfer to the same account
        if ($request->source === $request->destination) {
            return redirect()->back()->with('error', "Errrmmm, You cannot transfer funds into the same account");
        }

        $updateData = [
            "amount" => $request->amount,
            "date" => $request->date,
            "source_account" => $request->source,
            "destination_account" => $request->destination,
            "notes" => $request->notes,
        ];

        try {
            $transfer->update($updateData);
            return redirect()->back()->with('success', "Bingo! Transfer has been updated successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side". $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $transfer_id)
    {
        // find the given transfer
        $transfer = $this->findTransfer($transfer_id);

        $transfer->status = 'deleted';

        try {
            $transfer->save();
            return redirect()->back()->with('success', "Bingo! Transfer deleted successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
        }
    }

    public function filterTransfers(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required'
            // 'account_number' => 'required'
        ]);

        $start = $request->start_date;
        $end = $request->end_date;

        $filteredList = FundTransfer::whereBetween('date', [$start, $end])
            ->whereStatus('active')
            ->whereSubscriberId($this->active_subscriber)
            ->get();

        $i = 1;

        $data = [
            'i' => $i,
            'all_transfers' => $filteredList
        ];

        return view('Admin.transfers._filter', $data);
    }

    private function transferId()
    {
        $count = FundTransfer::whereSubscriberId($this->active_subscriber)
            ->whereStatus('active')
            ->orderBy('sn', 'desc')
            ->count() + 1;

        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }

    private function validateRequest($request) {
        return $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'source' => 'required',
            'destination' => 'required',
            'notes' => 'required'
        ]);
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
