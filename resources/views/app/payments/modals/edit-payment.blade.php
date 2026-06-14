<div id="edit-payment-modal"
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/7">
            <div class="flex justify-between items-center py-3 px-6 border-b border-border dark:border-gray-700">
                <h3 class="font-normal text-2xl font-cal-sans-regular text-gray-800 dark:text-white">
                    Edit Payment
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#edit-payment-modal">
                    <span class="sr-only">Close</span>
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>
            <form id="" autocomplete="off" method="POST" action="{{ route('payments.update', $customerPayment) }}">
                @csrf

                <div class="p-6 overflow-y-auto">

                    <div class="grid grid-cols-12 gap-6">

                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <x-printforce.inputs.select-input name="customer_id" label="Customer" :options="$customers"
                                :selected="$customerPayment->customer_id" />
                        </div>

                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        </div>


                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Amount Paid</label>
                                <input type="number" step="any" min="1" class="form-control" name="amount_paid"
                                    id="amount_paid" value="{{ $customerPayment->amount_paid }}" required />
                            </div>
                        </div>

                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <x-printforce.inputs.date-input name="payment_date" label="Payment Date"
                                value="{{ $customerPayment->payment_date }}" required />
                        </div>

                        <div class="lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Account Number</label>
                                <select class="form-control form-select-sm" name="account_number" id="account_number"
                                    required>

                                    <option value="">--- Select Account ---</option>



                                    @foreach ($payment_accounts as $key => $value)

                                    <option value="{{ $key }}"
                                        {{ $key === $customerPayment->account_number ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>


                    </div>

                </div>

                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-6 border-t border-border dark:border-gray-700">
                    <button type="button"
                        class="btn text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-overlay="#edit-payment-modal">
                        Close
                    </button>
                    <button type="submit"
                        class="btn text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <i class="fi fi-rr-check me-3"></i>
                        Update Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
