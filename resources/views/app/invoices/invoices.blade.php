@extends('layout.app')


@section('content')

<x-headers.page-header pageTitle="Invoices" currentPage="Invoices">

    <div class="hs-dropdown relative inline-flex">
        <button id="hs-dropdown-default" type="button"
            class="hs-dropdown-toggle py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-md  border-gray-200 btn btn-primary">
            <span class="leading-tight">Actions</span>
            <i class="fi fi-rr-angle-down text-sm leading-tight font-medium hs-dropdown-open:rotate-180"></i>
        </button>
        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
            aria-labelledby="hs-dropdown-default">

            <x-dropdowns.dropdown-item icon="plus" label="New Invoice" data-hs-overlay="#new-invoice-modal" />
            <x-dropdowns.dropdown-item icon="file-invoice" label="Configure Invoice" />

        </div>
    </div>
</x-headers.page-header>

<div>

</div>

@livewire('livewire.invoices.invoices')

@include('app.invoices.modals.create-invoice')

@endsection


@section('js')
<script type="text/javascript">
    $(document).on('click', '.table tbody .print-invoice', function() {
        let $url = $(this).data('url')
        window.open($url, '_blank', 'height = 900, width = 800, scrollbars = yes');
    })

    $(document).on('click', '.table tbody .delete', function(event) {
        event.preventDefault();
        const $frm = $(this).closest('form')

        swalConfirm(
            () => $frm.submit(),
            "Do you want to delete this invoice"
        )
    })
</script>
@endsection
