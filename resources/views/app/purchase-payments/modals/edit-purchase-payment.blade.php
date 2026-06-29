<x-modals.modal modalId="edit_payment_modal">
    <x-modals.modal-header modalId="edit_payment_modal" modalTitle="Edit Purchase Payment" />

    <form method="POST" action="{{ route('purchase-payment.update', $purchasePayment) }}">
        @csrf
        @method('PATCH')
        <div class="p-6">

            <div class="grid grid-cols-12 gap-6">

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <label for="" class="form-label">Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="form-control">
                        <option value="{{ $purchasePayment->supplier_id }}">{{ $purchasePayment->supplier->supplier_name }}</option>
                    </select>
                </div>

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12"></div>

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <x-printforce.input.number-input name="amount_paid" id="amount_paid" label="Amount Paid"
                        value="{{ $purchasePayment->amount_paid }}" placeholder="Enter amount paid" required="true" />
                </div>

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <x-printforce.inputs.text-input name="reference" id="reference" label="Cheque # / Reference"
                        placeholder="Enter cheque number or reference" value="{{ $purchasePayment->reference }}" required="true" />
                </div>

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <x-printforce.inputs.date-input name="date" id="date" label="Payment Date" value="{{ now()->format('Y-m-d') }}"
                        required="true" value="{{ $purchasePayment->date }}" />
                </div>

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <x-printforce.inputs.select-input name="account_number" id="account_number" label="Payment Account"
                        :options="$operating_accounts" :selected="$purchasePayment->account_number" required="true" />
                </div>

                <div class="lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                    <x-printforce.inputs.text-input name="notes" id="notes" label="Notes"
                        value="{{ $purchasePayment->notes ?? 'Payment for material supply' }}"
                        placeholder="Enter any additional notes here" />
                </div>




            </div>

        </div>



        <x-modals.modal-footer modalId="edit_payment_modal" btnLabel="Update Payment Info" />

    </form>
</x-modals.modal>
