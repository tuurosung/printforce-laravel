<?php

namespace App\Http\Controllers\Purchases;

use Illuminate\Http\Request;
use App\Models\Purchases\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OffloadPurchaseInvoiceCartController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Purchase $purchase)
    {
        try {
            $this->offloadPurchase($purchase);
            $this->activateCartItems($purchase);

            return to_route('purchases.index')
                ->with('success', 'Purchase invoice offloaded successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong while offloading the purchase');
        }
    }

    private function offloadPurchase(Purchase $purchase): void
    {
        $purchase->update([
            'status' => 'active',
            'lockstatus' => 'locked',
            'date_offloaded' => now(),
            'created_by' => Auth::id()
        ]);
    }

    private function activateCartItems(Purchase $purchase): void
    {
        $purchase->cartItems()->update(['status' => 'active']);
    }
}
