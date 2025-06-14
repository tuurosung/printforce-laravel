@extends('layout.app')

@section('content')

<x-printforce.headers.page-header title="Suppliers" >

    <button data-toggle="modal" data-target="#new_supplier_modal" type="button" class="btn btn-primary">

        <i class="fas fa-plus me-3"></i>
        New Supplier
    </button>
</x-printforce.headers.page-header>


    @include('layout.errors')

<div class="card border-0">
    <div class="card-body">

        <table class="table table-sm datatables">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Date Created</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Credit</th>
                    <th>Debit</th>
                    <th>Balance</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $supplier->created_at }}</td>
                    <td style="text-decoration: underline;">

                        <a href="{{ route('suppliers.info', $supplier) }}">
                            {{ $supplier->supplier_name }}
                        </a>

                    </td>
                    <td>{{ $supplier->supplier_phone }}</td>
                    <td>{{ $supplier->supplier_address }}</td>
                    <td>{{ number_format($supplier->total_purchase, 2) }}</td>
                    <td>{{ number_format($supplier->total_payment, 2) }}</td>
                    <td>{{ number_format($supplier->supplier_balance, 2) }}</td>
                    <td class="text-end">
                        <a href="javascript:void(0)" class="edit me-1 text-primary"
                            data-url="{{ route('suppliers.edit', $supplier->supplier_id) }}">
                            <i class="fi fi-rc-pencil"></i>
                            Edit
                        </a>
                        <form action="{{ route('suppliers.delete', $supplier) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <a type="button" class="text-danger delete">
                                <i class="fas fa-trash-alt"></i>
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


@include('app.suppliers.modals.new-supplier')

<div id="modal_holder"></div>
@endsection

@section('js')

    <script type="text/javascript">
    $(document).on('click', '.table tbody .edit', function() {

        const url = $(this).data('url')

        $.get(url, function (msg) {

            $('#modal_holder').html(msg)
            $('#edit_supplier_modal').modal('show')
        })
    })


    $(document).on('click', '.table tbody .delete', function() {

        const $form = $(this).closest('form')

        bootbox.confirm("Are you sure you want to delete this supplier?", function(answer) {

            if (answer) {
                $form.submit()
            }
        })

    })
    </script>
@endsection
