
<div id="design_job_modal"
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-6 border-b border-border dark:border-gray-700">
                <h3 class="font-normal text-2xl font-cal-sans-regular text-gray-800 dark:text-white">
                    New Design Job
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#hs-basic-modal">
                    <span class="sr-only">Close</span>
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>
            <form method="POST" action="{{ route('jobs.design.store', $customer) }}" autocomplete="off">
                @csrf
                <div class="p-6 overflow-y-auto">
                    <div class="modal-body">


                        <div class="grid grid-cols-2 gap-6 mb-5">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control" name="customer_name" id="customer_name"
                                        value="{{ $customer->name }}" readonly />
                                </div>

                            </div>
                            <div class="col">
                                <x-printforce.inputs.date-input name="date" id="design_date" label="Job Date"
                                    required />
                            </div>
                        </div>


                        <div class="grid grid-cols-4 gap-6 mb-5">
                            <div class="col col-span-2">
                                <div class="mb-3">
                                    <label for="service_id" class="form-label">Service Name</label>
                                    <select class="form-control" name="service_id" id="design_service_id"
                                        data-fetch_url="{{ route('configuration.print-services.get-service-cost-with-customer-id') }}"
                                        data-customer_id="{{ $customer->customer_id }}" required>

                                        <option value="" selected>Select one</option>

                                        @foreach ($design_services as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>
                            <div class="col">
                                <label for="" class="form-label">Cost</label>
                                <input type="text" class="form-control" name="unit_cost" id="design_cost" readonly required>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Qty</label>
                                <input type="text" class="form-control" name="copies" id="design_copies" value="1" required>
                            </div>
                        </div>



                        <div class="grid grid-cols-4 gap-6 mb-5">
                            <div class="col">
                                <label for="sub_total" class="form-label">Sub Total</label>
                                <input type="text" class="form-control" name="sub_total" id="sub_total" required readonly />
                            </div>
                            <div class="col">
                                <label for="premium" class="form-label">Premium</label>
                                <input type="text" class="form-control" name="premium" id="design_premium" value="0" required />
                            </div>
                            <div class="col">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="text" class="form-control" name="discount" id="discount" value="0" required />
                            </div>
                            <div class="col">
                                <label for="" class="form-label">Total Cost</label>
                                <input type="text" class="form-control" name="total" id="design_total" readonly required>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Notes (optional eg; Logo Design)</label>
                            <input type="text" class="form-control" name="notes" id="de_notes" value="">
                        </div>

                    </div>
                </div>
                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-6 border-t border-border dark:border-gray-700">
                    <button type="button"
                        class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-overlay="#hs-basic-modal">
                        Close
                    </button>
                    <button type="submit"
                        class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 cursor-pointer">
                        <i class="fi fi-rr-check me-3"></i>
                        Create Design Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
