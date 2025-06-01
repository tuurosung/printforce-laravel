@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h2 class="h2">Debtors List</h2>
    </div>
    <div>
        <button
            type="button"
            id="printBtn"
            class="btn btn-primary"
        >
            <i class="fas fa-print me-3"></i>
            Print Report
        </button>

    </div>
</div>

<hr>

<div class="row mb-3">
    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">
                <p class="mb-2">Number of Debtors</p>
                <h4 class="h5 mb-0">{{ $debtors->count() }}</h4>
            </div>
        </div>

    </div>
    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">
                <p class="mb-2">Total Debt</p>
                <h5 class="h5 mb-0">{{ number_format($debtors->sum('balance'), 2) }}</h5>
            </div>
        </div>
    </div>
</div>

<div class="card border-0">
    <div class="card-body">

        <table class="table table-sm datatables">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th class="text-end">Debit</th>
                    <th class="text-end">Credit</th>
                    <th class="text-end">Balance</th>
                </tr>
            </thead>
            <tbody>

                @php
                $i = 1;
                @endphp

                @foreach ($debtors as $debtor)
                <tr>
                    <td scope="row">{{ $i++ }}</td>
                    <td>{{ $debtor->name }}</td>
                    <td class="text-end pe-20px">{{ number_format($debtor->debit, 2) }}</td>
                    <td class="text-end  pe-20px">{{ number_format($debtor->credit, 2) }}</td>
                    <td class="text-end  pe-20px">{{ number_format($debtor->debit - $debtor->credit, 2) }}</td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>
@endsection


@section('js')

<script>
    $(document).ready(function() {
        $('#printBtn').click(function(e) {
            e.preventDefault();
            window.open("{{ route('customers.debtors.print') }}", '_blank', 'height = 900, width = 800, scrollbars = yes');
        });
    });

</script>t
@endsection
