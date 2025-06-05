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
            <form id="newTransferFrm" autocomplete="off" method="POST" action="{{ route('accounting.transfers.store') }}">

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
                            <x-printforce.inputs.date-input
                                name="date"
                                id="date"
                                label="Date"
                                value="{{ date('Y-m-d') }}"
                                required="true"
                                />
                        </div>

                    </div>


                    <div class="row">

                        <div class="col">
                            <x-printforce.inputs.select-input
                                name="source_account"
                                id="source_account"
                                label="Transfer From"
                                :options="$all_accounts"
                                required="true"
                                />

                        </div>

                        <div class="col">
                            <x-printforce.inputs.select-input
                                name="destination_account"
                                id="destination_account"
                                label="Transfer To"
                                :options="$all_accounts"
                                required="true"
                                />

                        </div>

                    </div>

                    <x-printforce.inputs.text-input
                        name="notes"
                        id="notes"
                        label="Narration"
                        value=""
                        required="true"
                        />

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
