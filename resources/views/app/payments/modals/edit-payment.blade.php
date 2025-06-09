<div
    class="modal fade"
    id="edit_payment_modal"
    tabindex="-1"

    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div
        class="modal-dialog"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit Payment
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="" autocomplete="off" method="POST" action="{{ route('payments.update', $customerPayment) }}">
                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="col">
                            <x-printforce.inputs.select-input
                                name="customer_id"
                                label="Customer"
                                :options="$customers"
                                :selected="$customerPayment->customer_id"
                                />

                        </div>

                        <div class="col">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Amount Paid</label>
                                <input
                                    type="number"
                                    step="any"
                                    min="1"
                                    class="form-control form-control-sm"
                                    name="amount_paid"
                                    id="amount_paid"
                                    value="{{ $customerPayment->amount_paid }}"
                                    required />
                            </div>
                        </div>

                        <div class="col">
                            <x-printforce.inputs.date-input
                                name="payment_date"
                                label="Payment Date"
                                value="{{ $customerPayment->payment_date }}"
                                required />
                        </div>

                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Account Number</label>
                        <select
                            class="form-select form-select-sm"
                            name="account_number"
                            id="account_number"
                            required>

                            <option value="">--- Select Account ---</option>



                            @foreach ($payment_accounts as $key => $value)

                                <option value="{{ $key }}" {{ $key === $customerPayment->account_number ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-3  "></i>
                        Record Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
