@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Expenditure">
    <button class="btn btn-primary" onclick="Livewire.dispatch('newExpenditure')">
        <i class="fi fi-rr-plus me-2"></i>
        New Expenditure
    </button>
</x-headers.page-header>



@can('administrator')

<!-- Only show to admins -->
<div class="grid grid-cols-4 gap-6">
    <div class="col">
        <x-printforce.cards.colour-card title="Total Expenses" :value="$total_expenditure" bgColour="primary" />
    </div>
    <div class="col">
        <x-printforce.cards.colour-card title="Monthly Expenses" :value="$monthly_expenditure" bgColour="danger" />
    </div>
    <div class="col">
        <x-printforce.cards.colour-card title="Yearly Expenses" :value="$yearly_expenditure" bgColour="success" />
    </div>
</div>

@endcan



<div class="card border-0 mt-6">
    <div class="card-body">

        <!-- Only show to admin -->
        @can('administrator')
            @include('app.expenditure.partials.filter-expenses-frm')
        @endcan



        <div id="data_holder">
            <table class="table datatables table-sm">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Source Account</th>
                        <th>Destination Acc</th>
                        <th>Narration</th>
                        <th class="text-end">Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    $total = 0;
                    @endphp

                    @foreach ($all_expenses as $expenditure)

                    <tr class="">
                        <td>{{ $i++ }}</td>
                        <td>{{ $expenditure->date }}</td>
                        <td>{{ $expenditure->destination->account_name }}</td>
                        <td>{{ $expenditure->source->account_name }}</td>
                        <td>
                            {{ $expenditure->narration }}
                        </td>

                        <td class="text-end pe-20px">{{ number_format($expenditure->amount, 2) }}</td>
                        <td class="text-end col-2">
                            <button
                                type="button"
                                class="cursor-pointer text-primary hover:underline me-2"
                                onclick="Livewire.dispatch('editExpenditure', { expenditure: '{{ $expenditure->expenditure_id }}' })">
                                Edit
                            </button>
                            <button
                                type="button"
                                class="cursor-pointer text-danger hover:underline"
                                onclick="confirmDelete('{{ $expenditure->expenditure_id }}')">
                                Delete
                            </button>

                        </td>
                    </tr>

                    @php
                    $total += $expenditure->amount; //increment total by amount
                    @endphp

                    @endforeach

                    <tr>
                        <td>-----------</td>
                        <td>-----------</td>
                        <td>-----------</td>
                        <td>-----------</td>
                        <td>-----------</td>
                        <td class="text-end Axiforma fs-20px fw-600 pe-20px">
                            {{ number_format($total, 2) }}
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- include new expenditure modal -->
<livewire:livewire.expenditure.new-expenditure />

<div id="modal_holder"></div>
@endsection

@section('js')
<script type="text/javascript">


</script>
@endsection


