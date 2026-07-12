@extends('layout.app')


@section('content')

    <x-headers.page-header pageTitle="Jobs" currentPage="Today's Jobs"></x-headers.page-header>

    <div class="flex justify-content-between mb-5">
        <div>
            <h2 class="h2 mb-0">Todays Jobs Summary</h2>
        </div>
        <div></div>
    </div>


    <div class="grid grid-cols-12 gap-6">
        <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">

            <x-printforce.cards.colour-card title="Total Jobs" bgColour="primary" value="0" />

            <div class="card border-primary">
                <div class="card-body">
                    <p class="mb-1">Today's Jobs</p>
                    <h4 class="h4 mb-0">GHS {{
        number_format(
            collect([
                $todays_largeformat_jobs->sum('total'),
                $todays_embroidery_jobs->sum('total'),
                $todays_design_jobs->sum('total')
            ])->sum()
            ,
            2
        )
                    }}</h4>
                </div>
            </div>

        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
    </div>


    <div class="card border-0">
        <div class="card-body">

            <h5 class="h5 mb-4">Large Format Jobs</h5>
            <div
                class="table-responsive mb-5">
                <table class="table w-full text-sm text-left rtl:text-right text-body">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Service</th>
                            <th scope="col">Customer</th>
                            <th scope="col" class="">Details</th>
                            <th scope="col" class="text-center">Copies</th>
                            <th scope="col" class="text-end">Discount</th>
                            <th scope="col" class="text-end">Premium</th>
                            <th scope="col" class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
    $i = 1;
                        @endphp

                        @foreach ($allJobs ?? [] as $job)
                            <tr class="">
                                <td scope="row">{{ $i++ }}</td>
                                <td>{{ $job->created_at }}</td>
                                <td>{{ $job->service?->service_name }}</td>
                                <td>{{ $job->customer?->name }}</td>
                                <td class="text-center">{{ $job->details }}</td>
                                <td class="text-center">{{ $job->unit_cost ?? $job->qty }}</td>
                                <td class="text-end">{{ number_format($job->discount, 2) }}</td>
                                <td class="text-end">{{ number_format($job->premium, 2) }}</td>
                                <td class="text-end">{{ number_format($job->total, 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="8" class="text-end fw-600">Total</td>
                            <td class="text-end fw-600">{{ number_format($todays_largeformat_jobs->sum('total'), 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <h5 class="h5 mb-4">Embroidery Jobs</h5>
            <div
                class="table-responsive mb-5">
                <table
                    class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Customer</th>
                            <th scope="col" class="text-end">Unit Cost</th>
                            <th scope="col" class="text-center">Qty</th>
                            <th scope="col" class="text-end">Embr. Cost</th>
                            <th scope="col" class="text-end">Mat. Purchase Cost</th>
                            <th scope="col" class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
    $i = 1;
                        @endphp

                        @foreach ($todays_embroidery_jobs as $job)
                        <tr class="">
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $job->service->service_name }}</td>
                            <td>{{ $job->customer->name }}</td>
                            <td class="text-end">{{ number_format($job->unit_cost, 2) }}</td>
                            <td class="text-center">{{ $job->qty }}</td>
                            <td class="text-end">{{ number_format($job->embroidery_cost, 2) }}</td>
                            <td class="text-end">{{ number_format($job->purchase_cost, 2) }}</td>
                            <td class="text-end">{{ number_format($job->total, 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="7" class="text-end fw-600">Total</td>
                            <td class="text-end fw-600">{{ number_format($todays_embroidery_jobs->sum('total'), 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h5 class="h5 mb-4">Press Jobs</h5>
            <div
                class="table-responsive mb-5">
                <table
                    class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Customer</th>
                            <th scope="col" class="text-end">Unit Cost</th>
                            <th scope="col" class="text-center">Qty</th>
                            <th scope="col" class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
    $i = 1;
                        @endphp

                        @foreach ($todays_press_jobs as $job)
                        <tr class="">
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $job->service->service_name }}</td>
                            <td>{{ $job->customer->name }}</td>
                            <td class="text-end">{{ number_format($job->cost, 2) }}</td>
                            <td class="text-center">{{ $job->copies }}</td>
                            <td class="text-end">{{ number_format($job->total, 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-end fw-600">Total</td>
                            <td class="text-end fw-600">{{ number_format($todays_press_jobs->sum('total'), 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <h5 class="h5 mb-4">Design Jobs</h5>
            <div
                class="table-responsive mb-5">
                <table
                    class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Customer</th>
                            <th scope="col" class="text-end">Unit Cost</th>
                            <th scope="col" class="text-center">Qty</th>
                            <th scope="col" class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
    $i = 1;
                        @endphp

                        @foreach ($todays_design_jobs as $job)
                        <tr class="">
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $job->service->service_name }}</td>
                            <td>{{ $job->customer->name }}</td>
                            <td class="text-end">{{ number_format($job->unit_cost, 2) }}</td>
                            <td class="text-center">{{ $job->copies }}</td>
                            <td class="text-end">{{ number_format($job->total, 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-end fw-600">Total</td>
                            <td class="text-end fw-600">{{ number_format($todays_design_jobs->sum('total'), 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <h5 class="h5 mb-4">Photography Jobs</h5>
            <div
                class="table-responsive mb-5">
                <table
                    class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Customer</th>
                            <th scope="col" class="text-end">Unit Cost</th>
                            <th scope="col" class="text-center">Qty</th>
                            <th scope="col" class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
    $i = 1;
                        @endphp

                        @foreach ($todays_photography_jobs as $job)
                        <tr class="">
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $job->service->service_name }}</td>
                            <td>{{ $job->customer->name }}</td>
                            <td class="text-end">{{ number_format($job->unit_cost, 2) }}</td>
                            <td class="text-center">{{ $job->copies }}</td>
                            <td class="text-end">{{ number_format($job->total, 2) }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-end fw-600">Total</td>
                            <td class="text-end fw-600">{{ number_format($todays_photography_jobs->sum('total'), 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
