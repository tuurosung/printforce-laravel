<div
    class="modal fade"
    id="newExpenditureModal"
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
                    Record Expenses
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form id="" autocomplete="off" method="POST" action="{{ route('accounting.expenditure.store') }}">
                @csrf

                <div class="modal-body">

                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Amount</label>
                                <input
                                    type="number"
                                    class="form-control form-control-sm"
                                    step="any"
                                    min="0"
                                    name="amount"
                                    id="amount"
                                    value=""
                                    required />
                            </div>
                        </div>

                        <div class="col">
                            <x-printforce.inputs.date-input name="date" id="expenditure_date" label="Expenditure Date" value="{{ now()->format('Y-m-d') }}" required />

                        </div>

                    </div>


                    <x-printforce.inputs.text-input name="description" id="description" label="Description" value="" required />


                    <div class="row">
                        <div class="col-6">
                            <x-printforce.inputs.select-input name="header_id" id="header_id" label="Expenditure Header" :options="$expenditure_headers" required />

                        </div>
                        <div class="col-6">
                            <x-printforce.inputs.select-input name="account_number" id="account_number" label="Account" :options="$all_accounts" required />

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
                        Record Expense
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
