@extends('layout.app')


@section('content')

<div class="d-flex justify-content-between mb-5">
    <div>
        <h4 class="h2 fw-600">Purchases</h4>
    </div>
    <div></div>
</div>

<div class="card border-0">
    <div class="card-body">

        <h4 class="montserrat font-weight-bold mb-5">Purchase Invoices</h4>

        <table class="table">
            <thead class="elegant-color text-white">
                <tr>
                    <th>#</th>
                    <th>Purchase ID</th>
                    <th>Supplier Name</th>
                    <th>Date Issued</th>
                    <th>Due Date</th>
                    <th class="text-right">Supply Cost</th>
                    <th class="text-right">Tax</th>
                    <th class="text-right">Transportation</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp

                @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td class="" style="text-decoration:underline">
                        <a href="{{ route('prepare-invoice', $purchase) }}">
                            {{ $purchase->purchase_id }}
                        </a>
                    </td>
                    <td>{{ $purchase->supplier->supplier_name }}</td>
                    <td>{{ $purchase->date_issued ?? $purchase->created_at }}</td>
                    <td>{{ $purchase->due_date }}</td>
                    <td class="text-right">{{ number_format($purchase->supply_cost, 2) }}</td>
                    <td class="text-right">{{ number_format($purchase->total_tax, 2) }}</td>
                    <td class="text-right">{{ number_format($purchase->transportation, 2) }}</td>
                    <td class="text-right">{{ number_format($purchase->purchase_total, 2) }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>

@endsection

@section('js')

@endsection
