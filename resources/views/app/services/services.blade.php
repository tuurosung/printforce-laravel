@extends('layout.app')

@section('content')

    <x-printforce.headers.page-header title="Print Services">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_service_modal">
            <i class="fas fa-plus me-3  "></i>
            New Service
        </button>
    </x-printforce.headers.page-header>

    @include('layout.errors')


    <!-- tab v2 with card -->
    <div class="card border-0">
        <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
            @foreach ($printServiceCategories as $printServiceCategory)
                <li class="nav-item me-3">
                    <a href="#{{ $printServiceCategory->category_id }}"
                        class="nav-link {{ $loop->iteration === 1 ? 'active' : '' }}" data-bs-toggle="tab" data-toggle="tab">
                        {{ $printServiceCategory->category_name }}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content p-4">

            @foreach ($printServiceCategories as $printServiceCategory)
                <div class="tab-pane fade {{ $loop->iteration == 1 ? 'show active' : '' }}"
                    id="{{ $printServiceCategory->category_id }}">


                    <h5 class="h5 mb-5">{{ $printServiceCategory->category_name }}</h5>

                    <table class="table table-sm datatables">
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
                            @foreach ($printServiceCategory->services as $printService)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $printService->created_at }}</td>
                                    <td>{{ $printService->service_name }}</td>
                                    <td class="text-end">{{ number_format($printService['artist'], 2) }}</td>
                                    <td class="text-end">{{ number_format($printService['individual'], 2) }}</td>
                                    <td class="text-end">{{ number_format($printService['institution'], 2) }}</td>
                                    <td class="text-end">

                                        <a href="#" class="edit text-primary me-3"
                                            data-url="{{ route('configuration.print-services.edit', $printService) }}">
                                            <i class="fas fa-pen text-primary"></i>
                                            Edit
                                        </a>

                                        <form class="d-inline-block" method="POST"
                                            action="{{ route('configuration.print-services.delete', $printService) }}">
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
            @endforeach

        </div>
    </div>


    <div id="modal_holder"></div>

    @include('app.services.modals.new-service-modal')

@endsection


@section('js')
    <script type="text/javascript" src="{{ asset('assets/js/printforce/print-services/print-services.js') }}"></script>
@endsection
