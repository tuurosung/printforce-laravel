<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Services\Accounting\FundTransferService;
use Illuminate\Http\Request;

class FilterFundTransferController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        $fundTransferService = new FundTransferService();

        return view('app.fund-transfers.filter-transfers', [
            'filteredTransfers' => $fundTransferService->filterFundTransfer($start_date, $end_date)
        ]);
    }
}
