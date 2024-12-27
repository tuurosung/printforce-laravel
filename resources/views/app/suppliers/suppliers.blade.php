@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-5">
    <div>
        <h3 class="h2">Suppliers</h3>
    </div>
    <div>
        <a
            data-toggle="modal"
            data-target="#new_supplier_modal"
            type="button"
            class="btn btn-primary">

            <i class="fas fa-plus me-3"></i>
            New Supplier
        </a>
    </div>
</div>

<div class="card border-0">
    <div class="card-body">

        <table class="table table-sm datatables">
            <thead class="">
                <tr>
                    <th>#</th>
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
                @php
                $i = 1;
                @endphp

                @foreach ($suppliers as $supplier)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="text-decoration: underline;">

                        <a href="{{ route('supplier-info', $supplier->supplier_id) }}">
                            {{ $supplier->supplier_name }}
                        </a>

                    </td>
                    <td>{{ $supplier->supplier_phone }}</td>
                    <td>{{ $supplier->supplier_address }}</td>
                    <td><?php echo number_format($supplier->totalPurchase(), 2); ?></td>
                    <td><?php echo number_format($supplier->totalPayment(), 2); ?></td>
                    <td><?php echo number_format($supplier->supplierBalance(), 2); ?></td>
                    <td class="text-end">
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
                                    class="dropdown-item edit-supplier me-3"
                                    data-url="{{ route('edit-supplier', $supplier->supplier_id) }}">

                                    <i class="fas fa-pen text-primary me-3"></i>
                                    Edit
                                </a>
                                <a
                                    class="dropdown-item delete">

                                    <i class="fas fa-trash-alt text-danger me-3"></i>
                                    Delete
                                </a>
                            </div>
                        </div>


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
    $('.table tbody').on('click', '.edit-supplier', function() {

        const url = $(this).data('url')

        showEditModal(url)
    })

    $('.table tbody').on('click', '.delete-supplier', function() {

        const supplier = $(this)
        confirmDelete(supplier)
    })

    const showEditModal = function(url) {
        $.get(url, function(msg) {

            $('#modal_holder').html(msg)
            new bootstrap.Modal(document.getElementById('edit_supplier_modal')).show()
        })
    }

    const confirmDelete = function(supplier) {

        new swal("Confirm", "Are you sure you want to delete this supplier?", "warning", {
                buttons: {
                    cancel: "Cancel",
                    catch: {
                        text: "Yes! Delete it!",
                        value: "catch",
                    }
                }
            })
            .then((value) => {

                switch (value) {
                    case "cancel":
                        break;
                    case "catch":
                        supplier.closest('form').submit();
                        break;
                }
            })

    }
</script>
@endsection
