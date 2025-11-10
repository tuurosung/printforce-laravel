@extends('layout.app')

@section('content')

        <x-printforce.headers.page-header title="Expenses">
        <button
                    type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#newExpenditureModal">

                    <i class="fas fa-plus me-3"></i>
                    New Expense

                </button>
        </x-printforce.headers.page-header>


        @can('administrator')
            <!-- Only show to admins -->
            <div class="row mb-5">

                <div class="col-md-2">
                    <x-printforce.cards.colour-card title="Total Expenses" :value="$total_expenditure" bgColour="primary" />
                </div>

                <div class="col-md-2">
                    <x-printforce.cards.colour-card title="Monthly Expenses" :value="$monthly_expenditure" bgColour="danger" />
                </div>
                <div class="col-md-2">
                    <x-printforce.cards.colour-card title="Yearly Expenses" :value="$yearly_expenditure" bgColour="success" />
                </div>
                <div class="col-md-2">

                </div>

            </div>
        @endcan



        <div class="card border-0">
            <div class="card-body">

                <!-- Only show to admin -->
                @include('app.expenditure.partials.filter-expenses-frm')



                <div id="data_holder">
                    <table class="table datatables table-sm">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Header</th>
                                <th>Description</th>
                                <th>Account</th>
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

                                                @php
        $expenditure_id = $expenditure->expenditure_id
                                                @endphp

                                                <tr class="">
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $expenditure->date }}</td>
                                                    <td>{{ $expenditure->header?->header_name }}</td>
                                                    <td>
                                                        {{ $expenditure->description }}
                                                    </td>
                                                    <td>{{ $expenditure->account->account_name }}</td>
                                                    <td class="text-end pe-20px">{{ number_format($expenditure->amount, 2) }}</td>
                                                    <td class="text-end col-2">

                                                        <a href="javascript:void(0)" data-url="{{ route('accounting.expenditure.edit', $expenditure) }}" class="me-1 edit text-primary">

                                                            <i class="fas fa-pen"></i>
                                                            Edit

                                                        </a>

                                                    <form id="deleteFrm" method="POST" action="{{ route('accounting.expenditure.delete', $expenditure) }}" class="d-inline-block">
                                                        @csrf
                                                        <a href="javascript:void(0)" class="delete text-danger" data-url="">

                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                            Delete

                                                        </a>
                                                    </form>


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
        @include('app.expenditure.modals.new-expense-modal')

        <div id="modal_holder"></div>
@endsection

@section('js')
    <script type="text/javascript">
        $('#filterExpenditureFrm').on('submit', function(event) {
            event.preventDefault();

            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var customer_id = $('#customer_id').val();

            $('#filterExpenditureFrm').serialize();
            // var _token = ;
            const url = "{{ route('accounting.expenditure.filter') }}";

            $.post(url, {
                    _token: "{{ csrf_token() }}",
                    start_date,
                    end_date,
                    customer_id
                },
                function(data) {
                    $('#data_holder').html(data);
                }
            );

        });


        $(document).on('click', '.table tbody .edit', function (event){

            const url = $(this).data('url')

            $.get(url, function(response) {
                $('#modal_holder').html(response);
                initializeDatepickers();
                initializeSelect2();
                $('#editExpenditureModal').modal('show');
            })
        })


        $(document).on('click', '.table tbody .delete', function (event){

            const $form = $(this).closest('form');

            bootbox.confirm("Do you want to delete this expenditure?", function (result) {
                if (result) {
                    $form.submit();
                }
            });
        })


    </script>
@endsection


<?php
// require main file header
// require_once '../_main.php';
?>

<?php
// $e = new Expenditure($q->db, $q->mysqli);
// $account = new Account($q->db, $q->mysqli);
// $expenditure = new Expenditure($q->db, $q->mysqli);
?>
