@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Debtors List" currentPage="Debtors">
    <button type="button" class="btn btn-primary" id="printBtn">
        <i class="fi fi-rr-print me-3"></i>
        Print Report
    </button>
</x-headers.page-header>



@can('administrator')
<div class="grid grid-cols-12 gap-6 mb-8">
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">

        <x-printforce.cards.colour-card title="Debtors" :value="$debtors->count()" bgColour="primary"
            valueType="count" />

    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">

        <x-printforce.cards.colour-card title="Debt Amount" :value="$debtors->sum('debit') - $debtors->sum('credit')"
            bgColour="danger" valueType="money" />
    </div>
</div>
@endcan



<div class="card border-0">
    <div class="card-body">

        <table class="table w-full text-sm text-left rtl:text-right text-body" id="datatable">
            <thead class="thead">
                <tr>
                    <th class="text-start!">#</th>
                    <th>Customer</th>
                    <th class="text-end">Debit</th>
                    <th class="text-end">Credit</th>
                    <th class="text-end">Balance</th>
                    <th class="text-end!">Options</th>
                </tr>
            </thead>
            <tbody class="tbody">

                @foreach ($debtors as $debtor)
                <tr class="bg-neutral-primary-soft text-dark border-b border-default hover:bg-neutral-secondary-medium">
                    <td scope="row" class="text-start!">{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('customers.show', $debtor->customer_id) }}" class="underline">
                            {{ $debtor->name }}
                        </a>
                    </td>
                    <td class="text-end pe-20px">{{ number_format($debtor->debit, 2) }}</td>
                    <td class="text-end  pe-20px">{{ number_format($debtor->credit, 2) }}</td>
                    <td class="text-end  pe-20px">{{ number_format($debtor->debit - $debtor->credit, 2) }}</td>
                    <td class="text-end">
                        <a href="javascript:void(0)" class="text-blue-600">
                            <i class="fi fi-rr-envelope-open"></i>
                            Remind
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection


@section('js')


<script>
    new DataTable('#datatable', {
        layout: {
            topStart: {
                buttons: [{
                    extend: 'excelHtml5',
                    autoFilter: true,
                    sheetName: 'Debtors List',
                    title: "Printforce Debtors List",
                    text: "Export to Excel"
                }]
            }
        },
        paging: false
    });
</script>
@endsection
