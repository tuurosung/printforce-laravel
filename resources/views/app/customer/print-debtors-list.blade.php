@extends('layout.print')

@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h2 class="h4">Debtors List</h2>
    </div>
    <div>

    </div>
</div>

<hr>

<div class="row mb-3">
    <div class="col-4">

        <div class="card border-0">
            <div class="card-body">
                <p class="mb-2">Number of Debtors</p>
                <h4 class="h5 mb-0">{{ $debtors->count() }}</h4>
            </div>
        </div>

    </div>
    <div class="col-4">

        <div class="card border-0">
            <div class="card-body">
                <p class="mb-2">Total Debt</p>
                <h5 class="h5 mb-0">{{ number_format($debtors->sum('balance'), 2) }}</h5>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 mb-5">
    <div class="card-body">

        <table class="table table-sm">
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
                    <td class="text-end ">{{ number_format($debtor->debit, 2) }}</td>
                    <td class="text-end  ">{{ number_format($debtor->credit, 2) }}</td>
                    <td class="text-end  ">{{ number_format($debtor->balance, 2) }}</td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>


<div
    class="text-center">
    ****** Generated At {{ now()->format('M-d, Y H:i:s') }} *****
</div>
@endsection


@section('js')

<script>
    $(document).ready(function() {
       print()
    });
</script>
@endsection
