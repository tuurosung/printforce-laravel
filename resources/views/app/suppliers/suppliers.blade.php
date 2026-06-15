@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Suppliers" currentPage="Suppliers">

    <button type="button" class="btn" data-hs-overlay="#new-supplier-modal">
        <i class="fi fi-rr-plus me-3"></i>
        New Supplier
    </button>

</x-headers.page-header>



@include('layout.errors')

<div class="card border-0">
    <div class="card-body">

        <table class="table w-full text-sm text-left rtl:text-right text-body">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Date Created</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th class="text-end">Credit</th>
                    <th class="text-end">Debit</th>
                    <th class="text-end">Balance</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($suppliers as $supplier)
                <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $supplier->created_at }}</td>
                    <td style="text-decoration: underline;">

                        <a href="{{ route('suppliers.info', $supplier) }}">
                            {{ $supplier->supplier_name }}
                        </a>

                    </td>
                    <td>{{ $supplier->supplier_phone }}</td>
                    <td class="text-end">{{ number_format($supplier->total_purchase, 2) }}</td>
                    <td class="text-end">{{ number_format($supplier->total_payment, 2) }}</td>
                    <td class="text-end">{{ number_format($supplier->supplier_balance, 2) }}</td>
                    <td class="text-end">
                        <div class="hs-dropdown relative inline-flex">
                            <button id="hs-dropdown-default" type="button"
                                class="hs-dropdown-toggle inline-flex items-center gap-x-2 font-medium cursor-pointer underline">
                                <span class="leading-tight">Options</span>
                                <i
                                    class="fi fi-rr-angle-down leading-tight font-medium hs-dropdown-open:rotate-180"></i>
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                                aria-labelledby="hs-dropdown-default">

                                <x-dropdowns.dropdown-item label="Edit" icon="edit" iconColour="primary"
                                    data-url="{{ route('suppliers.edit', $supplier->supplier_id) }}" class="edit" />

                                <form action="{{ route('suppliers.delete', $supplier) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-dropdowns.dropdown-item label="Delete" icon="trash" iconColour="danger"
                                        class="delete" />
                                </form>

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

$(document).on('click', '.table tbody .edit', function() {

    const $url = $(this).data('url');

    $.get($url, function(data) {
        $('#modal_holder').html(data);

        const element = document.querySelector('#edit-supplier-modal')
        const modal = new HSOverlay(element);
        modal.open();
    })
})


$(document).on('click', '.table tbody .delete', function() {
    const $form = $(this).closest('form');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $form.submit();
        }
    })
})

</script>
@endsection
