<?php

namespace App\Domain\Purchases\Http\Controllers;

use App\Domain\Purchases\Models\Purchase;
use App\Http\Controllers\Controller;

class PrepareInvoiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Purchase $purchase)
    {
        $purchase->load('supplier', 'cartItems', 'purchasedItems');
        $supplier = $purchase->supplier;

        return view('app.suppliers.prepare-invoice', [
            'purchase' => $purchase,
            'supplier' => $supplier
        ]);
    }
}
