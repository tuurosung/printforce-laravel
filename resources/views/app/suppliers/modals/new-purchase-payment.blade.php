<x-modals.modal modalId="new_payment_modal">

    <x-modals.modal-header modalId="new_payment_modal" modalTitle="New Payment" />

    <form id="" autocomplete="off" method="POST" action="" {{ route('purchases.payments.store', $supplier) }}">
        @csrf

        <div class="p-6">

            <div class="grid grid-cols-12 gap-6">

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <x-printforce.input.number-input name="amount_paid" id="amount_paid" label="Amount Paid"
                            placeholder="Enter amount paid" required="true" />
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <x-printforce.inputs.text-input name="reference" id="reference" label="Cheque # / Reference"
                            placeholder="Enter cheque number or reference" value="{{ old('reference') }}"
                            required="true" />
                    </div>
                </div>

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <x-printforce.inputs.date-input name="date" id="date" label="Payment Date"
                            value="{{ now()->format('Y-m-d') }}" required="true" />
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <x-printforce.inputs.select-input name="account_number" id="account_number"
                            label="Payment Account" :options="$operating_accounts" required="true" />
                    </div>
                </div>
                <div class="lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                    <x-printforce.inputs.text-input name="notes" id="notes" label="Notes"
                        value="{{ old('notes') ?? 'Payment for material supply' }}"
                        placeholder="Enter any additional notes here" />
                </div>
            </div>

        </div>


        <x-modals.modal-footer modalId="new_payment_modal" btnLabel="Record Payment" />

    </form>

</x-modals.modal>
