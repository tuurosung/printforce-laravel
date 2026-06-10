<div id="embroidery_job_modal"
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-6 border-b border-border dark:border-gray-700">
                <h3 class="font-normal text-2xl font-cal-sans-regular text-gray-800 dark:text-white">
                    New Embroidery Job
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#hs-basic-modal">
                    <span class="sr-only">Close</span>
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>
            <form method="POST" action="{{ route('jobs.embroidery.store', $customer) }}" autocomplete="off">
                @csrf
                <div class="p-6 overflow-y-auto">
                    <div class="">

                        <div class="grid grid-cols-2 gap-6 mb-5">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control py-2.5 px-4" name="customer_name" id="customer_name"
                                        aria-describedby="" placeholder="" value="{{ $customer->name }}" readonly />
                                </div>

                            </div>
                            <div class="col">
                                <x-printforce.inputs.date-input name="date" id="embroidery_date" label="Job Date"
                                    required />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-5">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="service_id" class="form-label">Service Name</label>
                                    <select class="form-control" name="service_id" id="embroidery_service_id"
                                        data-fetch_url="{{ route('configuration.print-services.get-service-cost-with-customer-id') }}"
                                        data-customer_id="{{ $customer->customer_id }}" required>
                                        <option value="">--- Select one ---</option>
                                        @foreach ($embroidery_services as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="col">
                                <x-printforce.inputs.text-input name="unit_cost" id="embroidery_unit_cost"
                                    label="Unit Cost" placeholder="0.00" readonly="true" />
                            </div>
                        </div>


                        <div class="grid grid-cols-4 gap-6 mb-5">
                            <div class="col">
                                <x-printforce.inputs.text-input name="qty" id="embroidery_qty" label="Quantity"
                                    value="1" required />
                            </div>
                            <div class="col">
                                <x-printforce.inputs.text-input name="embroidery_cost" id="embroidery_cost"
                                    label="Embroidery Cost" placeholder="0.00" readonly="true" />
                            </div>
                            <div class="col-span-2">
                                <label for="" class="form-label">Material Purchase</label>
                                <select class="form-control" name="mat_supply" id="mat_supply" required>
                                    <option value="">-- Who is buying the materials? --</option>
                                    <option value="yes">Company Purchase</option>
                                    <option value="no">Client Provide</option>
                                </select>
                            </div>

                        </div>

                        <!-- Grid -->
                        <div class="grid grid-cols-4 gap-6 mb-5">
                            <div class="col">
                                <x-printforce.inputs.text-input name="mat_unit_cost" id="mat_unit_cost" label="Material Unit Cost" placeholder="0.00"
                                    required />
                            </div>
                            <div class="col">
                                <x-printforce.inputs.text-input name="purchase_cost" id="embroidery_purchase_cost" label="Material Purchase Cost"
                                    placeholder="0.00" readonly required />
                            </div>
                            <div class="col">
                                <x-printforce.inputs.text-input name="total" id="embroidery_total" label="Overall Cost"
                                    placeholder="0.00" readonly />
                            </div>
                        </div>



                        <x-printforce.inputs.text-input name="notes" id="em_notes"
                            label="Notes (optional eg; CRS Farmers T-shirts)" placeholder="" />


                    </div>
                </div>
                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-6 border-t border-border dark:border-gray-700">
                    <button type="button"
                        class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-overlay="#hs-basic-modal">
                        Close
                    </button>
                    <button type="button"
                        class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <i class="fas fa-check me-3  "></i>
                        Create Embroidery Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>