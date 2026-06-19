<div
    class="modal fade"
    id="editExpenditureModal"
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
                    Edit Expense
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form id="" autocomplete="off" method="POST" action="{{ route('accounting.expenditure.update', $expenditure) }}">
                @csrf

                <div class="modal-body">

                    <input type="hidden" name="expenditure_id" value="{{ $expenditure->expenditure_id }}" required>

                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Amount</label>
                                <input
                                    type="number"
                                    class="form-control "
                                    step="any"
                                    min="0"
                                    name="amount"
                                    id="amount"
                                    value="{{ $expenditure->amount }}"
                                    required />
                            </div>
                        </div>

                        <div class="col">
                            <x-printforce.inputs.date-input name="date" id="edit_date" label="Expenditure Date" value="{{ $expenditure->date }}" required />

                        </div>

                    </div>



                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <input
                            type="text"
                            class="form-control "
                            name="description"
                            id="description"
                            value="{{ $expenditure->description }}"
                            required />
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <x-printforce.inputs.select-input name="header_id" id="edit_header_id" label="Expenditure Header" :options="$expenditure_headers" :selected="$expenditure->header_id" required />

                        </div>
                        <div class="col-6">
                            <x-printforce.inputs.select-input name="account_number" id="edit_account_number" label="Account" :options="$all_accounts" :selected="$expenditure->account_number" required />

                        </div>
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
                        Update Expense
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
