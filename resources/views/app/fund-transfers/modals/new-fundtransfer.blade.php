<div
    class="modal fade"
    id="new_fundtransfer_modal"
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
                    New Fund Transfer
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="newTransferFrm" autocomplete="off" method="POST" action="{{ route('create-transfer') }}">

                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Amount</label>
                                <input
                                    type="number"
                                    step="any"
                                    min="1"
                                    class="form-control form-control-sm"
                                    name="amount"
                                    id="amount"
                                    value=""
                                    required />
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Date</label>
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="date"
                                    id="date"
                                    value="{{ date('Y-m-d') }}"
                                    required />
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Transfer From</label>
                                <select
                                    class="form-select form-select-sm"
                                    name="source_account"
                                    id="source_account"
                                    required>

                                    @foreach ($all_accounts as $account)

                                    <option value="{{ $account->account_number }}">
                                        {{ $account->account_name . ' GHS '.$account->account_balance }}
                                    </option>

                                    @endforeach


                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Transfer To</label>
                                <select
                                    class="form-select form-select-sm"
                                    name="destination_account"
                                    id="destination_account"
                                    required>

                                    @foreach ($all_accounts as $account)

                                    <option value="{{ $account->account_number }}">
                                        {{ $account->account_name . ' - GHS '. number_format($account->account_balance,2) }}
                                    </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Narration</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="notes"
                            id="notes"
                            value=""
                            required />
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
                        Transfer Funds
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
