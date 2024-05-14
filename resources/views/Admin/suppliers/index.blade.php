@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <div>
        <h3 class="fw-700 fs-30px montserrat">Suppliers</h3>
    </div>
    <div>
        <a href="{{ route('new.supplier') }}" type="button" class="btn btn-primary"><i class="fas fa-plus mr-3  "></i> New Supplier</a>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <table class="table table-secondary datatables">
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

                @foreach ($all_suppliers as $supplier)
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td style="text-decoration: underline;">

                        <a href="{{ route('supplier.info', $supplier->supplier_id) }}">
                            {{ $supplier->supplier_name }}
                        </a>

                    </td>
                    <td>{{ $supplier->supplier_phone }}</td>
                    <td>{{ $supplier->supplier_address }}</td>
                    <td><?php echo number_format($supplier->totalPurchase(), 2); ?></td>
                    <td><?php echo number_format($supplier->totalPayment(), 2); ?></td>
                    <td><?php echo number_format($supplier->supplierBalance(), 2); ?></td>
                    <td class="text-right">
                        <a href="{{ route('edit.supplier', $supplier->supplier_id) }}" style="text-decoration:none;" class="mr-3">
                            <i class="fas fa-pen text-primary"></i>
                        </a>
                        <a href="#" class="delete" data-url="">
                            <i class="fas fa-trash-alt text-danger"></i>
                        </a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>
</div>

<form id="deleteFrm" action="{{ route('update.supplier', $supplier->supplier_id) }}" method="POST">
    @csrf
    <input type="hidden" name="supplier_id" id="supplier_id" value="" required>
</form>

@endsection

@section('js')
<script type="text/javascript">
    $('.table tbody').on('click', '.delete', function() {

        const url = $(this).data('url')
        $('#deleteFrm').attr('action', url);

        bootbox.confirm("Are you sure you want to delete this supplier?", function(r) {
            if (r === true) {
                $('#deleteFrm').submit();
            }
        })

    })
</script>
@endsection
