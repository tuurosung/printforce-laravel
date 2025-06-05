<div
    class="modal fade"
    id="edit_fundtransfer_modal"
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
                    Edit Fund Transfer
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="newTransferFrm" autocomplete="off" method="POST" action="{{ route('accounting.transfers.update', $fundTransfer) }}">

                @csrf
                <div class="modal-body">

                    <input
                        type="hidden"
                        name="transfer_id"
                        id="transfer_id"
                        value="{{ $fundTransfer->transfer_id }}"
                        required />

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
                                    value="{{ $fundTransfer->amount }}"
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
                                    value="{{ $fundTransfer->date }}"
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

                                    @foreach ($all_accounts as $key => $value)

                                    <option value="{{ $key }}" {{ $key === $fundTransfer->source_account ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>

                                    @endforeach


                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <x-printforce.inputs.select-input
                                label="Transfer To"
                                name="destination_account"
                                id="destination_account"
                                :options="$all_accounts"
                                :selected="$fundTransfer->destination_account"
                                required="true"
                                />
                        </div>

                    </div>

                    <x-printforce.inputs.text-input label="Notes" name="notes" id="notes" :value="$fundTransfer->notes" required="true" />
                   
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
                        Update Transfer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
