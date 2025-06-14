@extends('layout.app')


@section('content')

<x-printforce.headers.page-header title="Purchases">

</x-printforce.headers.page-header>



<div class="card border-0">
    <div class="card-body">

        <h4 class="montserrat font-weight-bold mb-5">Purchase Invoices</h4>

        <table class="table table-sm datatables">
            <thead class="elegant-color text-white">
                <tr>
                    <th>#</th>
                    <th>Date Created</th>
                    <th>Purchase ID</th>
                    <th>Supplier Name</th>
                    <th>Date Issued</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th class="text-end">Supply Cost</th>
                    <th class="text-end">Tax</th>
                    <th class="text-end">Total</th>
                    <th class="text-end">Options</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $purchase->created_at }}</td>
                    <td class="" style="text-decoration:underline">
                        <a href="{{ route('purchases.prepare-invoice', $purchase) }}">
                            {{ $purchase->invoice_id }}
                        </a>
                    </td>
                    <td>{{ $purchase->supplier->supplier_name }}</td>
                    <td>{{ $purchase->date_issued ?? $purchase->created_at }}</td>
                    <td>{{ $purchase->due_date }}</td>
                    <td class="{{ $purchase->invoiceStatus == 'Draft' ? 'text-primary' : '' }}">
                        {{ $purchase->invoiceStatus }}
                    </td>
                    <td class="text-end">{{ number_format($purchase->total, 2) }}</td>
                    <td class="text-end">{{ number_format($purchase->total_tax, 2) }}</td>
                    <td class="text-end">{{ number_format($purchase->total, 2) }}</td>
                    <td class="text-end">
                        <a href="javascript:void(0)" class="text-danger">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>

@endsection

@section('js')

@endsection
