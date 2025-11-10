@extends('layout.app')

@section('content')

    <x-printforce.headers.page-header title="Debtors List">
        <button
            type="button"
            class="btn btn-primary"
            id="printBtn">
            <i class="fas fa-print me-3"></i>
            Print Report
        </button>
    </x-printforce.headers.page-header>


    @can('administrator')
<div class="row mb-4">
        <div class="col-md-2">

            <x-printforce.cards.colour-card
                title="Debtors"
                :value="$debtors->count()"
                bgColour="primary"
                valueType="count"
                />

        </div>
        <div class="col-md-2">

        <x-printforce.cards.colour-card
                title="Debt Amount"
                :value="$debtors->sum('debit') - $debtors->sum('credit')"
                bgColour="danger"
                valueType="money"
                />
        </div>
    </div>
    @endcan



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
                            <td>
                                <a href="{{ route('customers.customer.info', $debtor) }}">
                                {{ $debtor->name }}
                                </a>
                           </td>
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
