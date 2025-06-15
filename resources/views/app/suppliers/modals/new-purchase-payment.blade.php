<x-printforce.modals.form-modal modalId="new_payment_modal" modalTitle="New Payment" formType="create"
    action="{{ route('purchases.payments.store', $supplier) }}" btnLabel="Record Payment">

    <div class="row">
        <div class="col-6">
            <x-printforce.input.number-input name="amount_paid" id="amount_paid" label="Amount Paid"
                placeholder="Enter amount paid" required="true" />
        </div>
        <div class="col-6">
            <x-printforce.inputs.text-input name="reference" id="reference" label="Cheque # / Reference"
                placeholder="Enter cheque number or reference" value="{{ old('reference') }}" required="true" />
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <x-printforce.inputs.date-input name="date" id="date" label="Payment Date" value="{{ now()->format('Y-m-d') }}"
                required="true" />
        </div>
        <div class="col-6">
            <x-printforce.inputs.select-input name="account_number" id="account_number" label="Payment Account"
                :options="$operating_accounts" required="true" />
        </div>
    </div>

    <x-printforce.inputs.text-input name="notes" id="notes" label="Notes"
        value="{{ old('notes') ?? 'Payment for material supply' }}" placeholder="Enter any additional notes here" />

</x-printforce.modals.form-modal>

