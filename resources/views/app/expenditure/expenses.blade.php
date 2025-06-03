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



<!-- Only show to admins -->
<div class="row mb-5">

    <div class="col-md-2">
        <x-printforce.cards.colour-card
            title="Total Expenses"
            value="{{ number_format($total_expenditure, 2) }}"
            bgColour="primary"
            />
    </div>

    <div class="col-md-2">
        <x-printforce.cards.colour-card
            title="Monthly Expenses"
            value="{{ number_format($monthly_expenditure, 2) }}"
            bgColour="danger"
            />
    </div>
    <div class="col-md-2">
        <x-printforce.cards.colour-card
            title="Yearly Expenses"
            value="{{ number_format($yearly_expenditure, 2) }}"
            bgColour="success"
            />
    </div>
    <div class="col-md-2">

    </div>

</div>


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

                            <div class="dropdown">
                                <a
                                    class="dropdown-toggle"
                                    type="button"
                                    id="triggerId"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    Options
                                </a>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <a
                                        data-url="{{ route('accounting.expenditure.edit', $expenditure) }}"
                                        class="me-3 dropdown-item edit_expense">

                                        <i class="fas fa-pen text-primary me-3"></i>
                                        Edit

                                    </a>

                                    <form id="deleteFrm" method="POST" action="{{ route('accounting.expenditure.delete', $expenditure) }}">
                                        @csrf
                                        <a
                                            href="#"
                                            class="delete_expense dropdown-item"
                                            data-url="">

                                            <i class="fas fa-trash-alt text-danger me-3"></i>
                                            Delete

                                        </a>
                                    </form>
                                </div>
                            </div>



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

        $('.table tbody').on('click', '.edit_expense', function(event) {
            const url = $(this).data('url')

            $.get(url, function(response) {
                $('#modal_holder').html(response);
                initializeDatepickers();
                initializeSelect2();
                $('#editExpenditureModal').modal('show');
            })
        })

        $('.table tbody').on('click', '.delete_expense', function(event) {

            const $this = $(this);

            new swal("Are you sure you want to delete this expenditure?", {
                    buttons: {
                        cancel: "No",
                        catch: {
                            text: "Yes",
                            value: "catch"
                        }
                    }
                })
                .then((value) => {
                    switch (value) {
                        case "cancel":
                            break;
                        case "catch":
                            $this.closest('form').submit();
                            break;
                    }
                });


        })

        $(document).ready(function() {

            $('.list-group-item').removeClass('active')
            $('#expenditure_nav').addClass('active')
            $('#expenditure_submenu').addClass('show')
            $('#expenses_li').addClass('active-submenu')

            $('#filterHeader').select2()

            // $('.select2').select2({
            //     dropdownParent: $('#newExpenditureModal')
            // })

            $('#date').datepicker()

            $('#newExpenditureModal').on('shown.bs.modal', function() {
                $('#amount').focus()
            })

            $('#new_expenditure_frm').on('submit', function(event) {
                event.preventDefault();

                $(this).submit(function(event) {
                    return false;
                })

                $.ajax({
                    url: 'expenditure-controoler/new-expense.php',
                    type: 'POST',
                    data: $('#new_expenditure_frm').serialize(),
                    success: function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert("Expenditure recorded successful", function() {
                                window.location.reload()
                            })
                        } else {
                            bootbox.alert(msg)
                        }
                    }
                })
            });


            $('#new_expenditure_header_frm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '../serverscripts/admin/Expenditure/new_expenditure_header_frm.php',
                    type: 'GET',
                    data: $(this).serialize(),
                    success: function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert('Header Added Successfully', function() {
                                window.location.reload()
                            })
                        } else {
                            bootbox.alert(msg)
                        }
                    }
                })
            });


            $('.table tbody').on('click', '.delete_header', function(event) {
                event.preventDefault();
                var header_id = $(this).attr('ID')
                bootbox.confirm("Do you want to delete this header?", function(r) {
                    if (r === true) {
                        $.get('../serverscripts/admin/Expenditure/delete_header.php?header_id=' + header_id, function(msg) {
                            if (msg === 'delete_successful') {
                                bootbox.alert("Header deleted successfully", function() {
                                    window.location.reload()
                                })
                            } else {
                                bootbox.alert(msg)
                            }
                        })
                    }
                }) //end confirm

            });


            $('.table tbody').on('click', '.edit', function() {
                let expenditureID = $(this).attr('ID');
                EditExpenditure(expenditureID)
            })




            // edit expenditure function
            function EditExpenditure(expenditureID) {
                if (expenditureID != "") {

                    $.post("../includes/modals/Expenditure/edit.php", 'expenditureID=' + expenditureID,
                        function(response) {
                            $('#modal_holder').html(response)
                            $('#editExpenditure').modal('show');

                            $('#editExpenditure').on('shown.bs.modal', function() {
                                $('#edit_date').datepicker()
                            })

                            $('#edit_account_number, #edit_header_id').select2();;

                            // Form submission
                            $('#editExpenditureFrm').on('submit', function(event) {
                                event.preventDefault();
                                $(this).submit(function(event) {
                                    return false;
                                })

                                $.ajax({
                                    url: '../serverscripts/admin/Expenditure/edit.php',
                                    type: 'POST',
                                    data: $('#editExpenditureFrm').serialize(),
                                    success: function(msg) {

                                        if (msg === 'update_successful') {
                                            bootbox.alert("Expenditure Updated Successfully", function() {
                                                window.location.reload();
                                            })
                                        } else {
                                            bootbox.alert(msg)
                                        }

                                    }
                                })
                            }); //end form submission

                        }
                    );
                }
            }


            function DeleteExpenditure() {
                if (expenditureID != "") {

                }
            }

        }); // end ready
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
