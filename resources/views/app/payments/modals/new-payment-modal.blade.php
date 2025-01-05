<div
    class="modal fade"
    id="new_payment_modal"
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
                    New Payment
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="" autocomplete="off" method="POST" action="{{ route('store.payment') }}">
                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Customer</label>
                                <select
                                    class="form-select form-select-sm"
                                    name="customer_id"
                                    id="customer_id"
                                    required>

                                    <option value="">--- Select Customer ---</option>

                                    @if (isset($customer))

                                    <option value="{{ $customer->customer_id }}" selected>{{ $customer->name }}</option>

                                    @elseif (isset($customers))

                                    @foreach ($customers as $customer)

                                    <option value="{{ $customer->customer_id }}" {{ $customer->customer_id === $customer_id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>

                                    @endforeach

                                    @endif



                                </select>
                            </div>
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
                                    required />
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Payment Date</label>
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="payment_date"
                                    id="date"
                                    value="{{ now()->format('Y-m-d') }}"
                                    required />
                            </div>
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



                            @foreach ($payment_accounts as $account)

                            <option value="{{ $account->account_number }}">
                                {{ $account->account_name }}
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
