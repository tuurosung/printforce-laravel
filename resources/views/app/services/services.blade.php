@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Services">

    <button type="button" class="btn btn-primary" data-hs-overlay="#new-service-modal">
        <i class="fi fi-rr-plus me-3"></i>
        New Service
    </button>

</x-headers.page-header>





<x-tabs.tab>
    <x-slot name="tabs">
        @php $i = 1; @endphp

        @foreach ($printServiceCategories as $serviceCategory)
        <x-tabs.tab-item id="tab{{ $serviceCategory->category_id }}" active="{{ $i++ == 1 ? true : false }}"
            controls="content{{ $serviceCategory->category_id }}" label="{{ $serviceCategory->category_name }}" />
        @endforeach
        </x-slot:tabs>

        <x-slot name="content">
            @php $i = 1; @endphp
            @foreach ($printServiceCategories as $serviceCategory)
            @php
            $active = $i++ == 1 ? true : false;
            @endphp
            <x-tabs.tab-content
                id="content{{ $serviceCategory->category_id }}"
                labelledby="tab{{ $serviceCategory->category_id }}"
                :active="$active">

                <table class="table w-full text-sm text-left rtl:text-right text-body">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Date Registered</th>
                            <th>Service Name</th>
                            <th class="text-end">Artist</th>
                            <th class="text-end">Individual</th>
                            <th class="text-end">Institution</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($serviceCategory->services as $printService)
                        <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                            <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                {{ $loop->iteration }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                {{ $printService->created_at }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap ">
                                {{ $printService->service_name }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap text-end">
                                {{ number_format($printService['artist'], 2) }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap text-end">
                                {{ number_format($printService['individual'], 2) }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap text-end">
                                {{ number_format($printService['institution'], 2) }}
                            </td>
                            <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap text-end">

                                <div class="hs-dropdown relative inline-flex">
                                    <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle  inline-flex items-center gap-x-2 underline cursor-pointer">
                                        <span class="leading-tight">Actions</span>
                                        <i class="fi fi-rr-angle-down hs-dropdown-open:rotate-180"></i>
                                    </button>

                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10 hidden" aria-labelledby="hs-dropdown-default" role="menu" style="transform: translate3d(545px, 197px, 0px);" data-placement="top-start">
                                        <x-dropdowns.dropdown-item label="Edit" icon="edit" iconColour="primary" class="edit" data-url="{{ route('print-services.edit', $printService) }}" />
                                        <form class="d-inline-block" method="POST"
                                            action="{{ route('print-services.destroy', $printService) }}">
                                            @csrf
                                            @method ('delete')
                                            <x-dropdowns.dropdown-item label="Delete" icon="trash" iconColour="danger" class="delete" />
                                        </form>

                                    </div>
                                </div>


                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>


            </x-tabs.tab-content>
            @endforeach
        </x-slot>
</x-tabs.tab>



<div id="modal_holder"></div>

@include('app.services.modals.new-service-modal')

@endsection


@section('js')
<script type="text/javascript">

    $(document).on('click', '.table tbody .edit', function(event) {
        event.preventDefault();

        const $url = $(this).data('url')
        $.get($url, function(response) {
            $('#modal_holder').html(response)
            const element = document.querySelector('#edit-service-modal')
            const modal = new HSOverlay(element);
            modal.open();
        })
    })

    $(document).on('click', '.table tbody .delete', function(event) {
        event.preventDefault();

        const $frm = $(this).closest('form');

        swalConfirm(() => $frm.submit(), "Do you want to delete this service?");
    })
    
</script>
@endsection
