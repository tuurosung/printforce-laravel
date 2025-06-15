@extends('layout.app')


@section('content')

    <x-printforce.headers.page-header title="Purchase Payments">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_payment_modal">

            <i class="fab fa-google-wallet me-3"></i>
            Make Payment
        </button>
    </x-printforce.headers.page-header>


    <div class="card border-0">
        <div class="card-body">


        <table class="table table-sm datatables">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Account</th>
                            <th scope="col" class="text-end">Amount Paid</th>
                            <th class="text-end">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr class="">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->supplier->supplier_name }}</td>
                                <td>{{ $payment->paymentAccount->account_name }}</td>
                                <td class="text-end">{{ number_format($payment->amount_paid, 2) }}</td>
                                <td class="text-end">
                                    <a href="javascript:void(0)" class="text-primary edit me-1" data-url="{{ route('purchases.payments.edit', $payment) }}">
                                        <i class="fi fi-rc-pencil"></i>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('purchases.payments.delete', $payment) }}" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" class="text-danger delete">
                                            <i class="fi fi-sr-trash"></i>
                                            Delete
                                        </a>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

        </div>
    </div>


    <div id="modal_holder"></div>

@endsection


@section('js')

    <script>
        $(document).on('click', '.table tbody .edit', function () {

            const url = $(this).data('url');

            $.get(url, function (response){
                $('#modal_holder').html(response);
                $('#edit_payment_modal').modal('show');
                initializeSelect2()
                initializeDatepickers()
            })
        });


        $(document).on('click', '.table tbody .delete', function () {

            $form = $(this).closest('form');

            bootbox.confirm("Are you sure you want to delete this payment?", function (result) {
                if (result) {
                    $form.submit();
                }
            })
        });
    </script>
@endsection
