@extends('layout.app')

@section('content')

                    <x-headers.page-header pageTitle="Services">

                        <button type="button" class="btn btn-primary" hs-data-overlay="#new-service-modal">
                            <i class="fi fi-rr-plus me-3"></i>
                            New Service
                        </button>

                    </x-headers.page-header>


                    <div class="card mb-6">
                        <div class="card-body">

                            <x-tabs.tab-item :active="true" controls="something-1" label="Test 1" />
                        </div>
                    </div>



                    <x-tabs.tab>
                        <x-slot name="tabs">

                            @php  $i = 1; @endphp

                            @foreach ($printServiceCategories as $serviceCategory)
                                <x-tabs.tab-item
                                    id="{{ $serviceCategory->category_id }}tab"
                                    active="{{ $i++ == 1 ? true : false }}"
                                    controls="#{{ $serviceCategory->category_id }}content"
                                    label="{{ $serviceCategory->category_name }}" />
                            @endforeach
                            <x-tabs.tab-item id="something-2" :active="false" controls="something-2-content" label="Test 2" />
                            <x-tabs.tab-item id="something-3" :active="false" controls="something-3-content" label="Test 3" />
                        </x-slot:tabs>

                        <x-slot name="content">
                            @php $i = 1; @endphp
                            @foreach ($printServiceCategories as $serviceCategory)
                            <x-tabs.tab-content id="{{ $serviceCategory->category_id }}content" labelledby="{{ $serviceCategory->category_id }}tab" active="{{ $i++ == 1 ? true : false }}">
                                1
                            </x-tabs.tab-content>
                            @endforeach
                            <x-tabs.tab-content id="something-2-content" labelledby="something-2" :active="false">
2
                            </x-tabs.tab-content>
                            <x-tabs.tab-content id="something-3-content" labelledby="something-3" :active="false">
3
                            </x-tabs.tab-content>
                        </x-slot>
                    </x-tabs.tab>

                    <div class="card">
                        <div class="card-body">

                            <div class="flex">
                                <div
                                    class="flex bg-gray-100 hover:bg-gray-200 rounded-md transition p-1 dark:bg-gray-700 dark:hover:bg-gray-600">

                                    <nav class="flex space-x-2" aria-label="Tabs" role="tablist">


                                            @foreach ($printServiceCategories as $serviceCategory)

                                                @php
        $isActive = $loop->iteration == 1;
                                                @endphp

                                                <x-tabs.tab-item id="{{ $serviceCategory->category_id }}-tab" label="{{ $serviceCategory->category_name }}"
                                                    icon="" dataHsTab="{{ $serviceCategory->category_id }}-content" :ariaSelected="$isActive"  />

                                            @endforeach

                                    </nav>

                                </div>
                            </div>


                            @php
    $i = 1;
                            @endphp
                            @foreach ($printServiceCategories as $serviceCategory)


                                <div id="{{ $serviceCategory->category_id }}-content" role="tabpanel" aria-labelledby="{{ $serviceCategory->category_id }}-tab" class="pt-5 {{ $i == 1 ? '' : 'hidden' }}">

                                    <h5 class="h5 mb-5">{{ $serviceCategory->category_name }}</h5>

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
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $printService->created_at }}</td>
                                                    <td>{{ $printService->service_name }}</td>
                                                    <td class="text-end">{{ number_format($printService['artist'], 2) }}</td>
                                                    <td class="text-end">{{ number_format($printService['individual'], 2) }}</td>
                                                    <td class="text-end">{{ number_format($printService['institution'], 2) }}</td>
                                                    <td class="text-end">

                                                        <a href="#" class="edit text-primary me-3" data-url="{{ route('print-services.edit', $printService) }}">
                                                            <i class="fas fa-pen text-primary"></i>
                                                            Edit
                                                        </a>

                                                        <form class="d-inline-block" method="POST"
                                                            action="{{ route('print-services.destroy', $printService) }}">
                                                            @csrf
                                                            @method ('delete')
                                                            <a href="#" class="delete text-danger">
                                                                <i class=" fas fa-trash-alt text-danger "></i>
                                                                Delete
                                                            </a>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>

                                @php
        $i++
                                @endphp


                            @endforeach

                        </div>
                    </div>





                    <div id="modal_holder"></div>

                    @include('app.services.modals.new-service-modal')

@endsection


@section('js')
    <script type="text/javascript" src="{{ asset('assets/js/printforce/print-services/print-services.js') }}"></script>
@endsection
