@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h3 class="montserrat fw-600 fs-30px">Expenses</h3>
    </div>
    <div>
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#newExpenditureModal">
            <i class="fas fa-plus mr-3"></i> New Expense
        </button>
    </div>
</div>

<!-- Only show to admins -->
<div class="row mb-3">

    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-briefcase fa-2x text-primary"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $expenditure_by_period['today'] }}</p>
                        <p>Today's Expenses</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-hand-holding-usd fa-2x text-danger"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $expenditure_by_period['week'] }}</p>
                        <p>Weekly Expenditure</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-wallet fa-2x text-success"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $expenditure_by_period['month'] }}</p>
                        <p>Monthly Expense</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-wallet fa-2x text-success"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $expenditure_by_period['year'] }}</p>
                        <p>Annual Expense</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-body">

        <!-- Only show to admin -->
        <!-- Filter form -->
        <form id="filterExpenditureFrm">

            <div class="d-flex">
                <div class="form-group mr-3">
                    <label for="">Start Date</label>
                    <input type="text" class="form-control" name="start_date" id="start_date" value="{{ $today }}">
                </div>
                <div class="form-group mr-3">
                    <label for="">End Date</label>
                    <input type="text" class="form-control" name="end_date" id="end_date" value="{{ $today }}">
                </div>
                <div class="form-group mr-3">
                    <label for="">Header</label>
                    <select class="browser-default custom-select" name="" id="filterHeader">

                        <option value="">-- Select Header --</option>

                        @foreach ($all_accounts as $account)
                        <option value="{{ $account->account_number }}">{{ $account->account_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="pt-20px">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search mr-3" aria-hidden="true"></i> Filter Expenses</button>
                </div>
            </div>

        </form>


        <div id="data_holder">
            <table class="table datatables table-secondary">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Header</th>
                        <th>Description</th>
                        <th>Account</th>
                        <th class="text-right">Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp

                    @foreach ($all_expenses as $expenditure)
                    @php
                    $expenditure_id = $expenditure->expenditure_id
                    @endphp
                    <tr class="">
                        <td>{{ $i++ }}</td>
                        <td>{{ $expenditure->date }}</td>
                        <td>{{ $expenditure->headers->header_name }}</td>
                        <td>
                            {{ $expenditure->description }}
                        </td>
                        <td>{{ $expenditure->account->account_name }}</td>
                        <td class="text-right">{{ number_format($expenditure->amount,2) }}</td>
                        <td class="text-right col-2">

                            <a href="{{ route('edit.expenditure', $expenditure_id) }}" class="mr-3 text-decoration-none">
                                <i class="fas fa-pen text-primary"></i>
                            </a>

                            <a href="#" class="delete" data-url="{{ route('delete.expenditure', $expenditure->expenditure_id) }}">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </a>

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
                        <td class="text-right Axiforma fs-20px fw-600">
                            {{ number_format($total,2) }}
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>



<div class="modal fade" id="newExpenditureModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Record Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="" autocomplete="off" method="POST" action="{{ route('create.expense') }}">
                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="number" class="form-control" step="any" min="0" name="amount" id="amount" value="" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" class="form-control" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>

                    </div>



                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="" required>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Expenditure Header</label>
                                <select class="browser-default custom-select select2" name="header_id" required>
                                    <option value="">--- Select Header ---</option>

                                    @foreach ($expenditure_headers as $header)
                                    <option value="{{ $header->header_id }}">{{ $header->header_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Account</label>
                                <select class="custom-select browser-default" name="account_number" required>
                                    <option value="">--- Select Account ---</option>

                                    @foreach ($all_accounts as $account)
                                    <option value="{{ $account->account_number }}">{{ $account->account_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-check mr-3"></i> Save Expense</button>
                </div>
            </form>
        </div>
    </div>
</div>


<form id="deleteFrm" method="POST" action="">
    @csrf
    <input type="hidden" name="expenditure_id" value="" required>
</form>
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
        const url = "{{ route('filter.expenditure') }}";

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

    $('.table tbody').on('click', '.delete', function(event) {
        const $this = $(this);
        const url = $this.data('url')

        bootbox.confirm('Are you sure you want to delete this expenditure?', function(confirmed) {
            if (confirmed) {
                $('#deleteFrm').attr('action', url);
                $('#deleteFrm').submit()
            }
        }); //end bootbox
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
