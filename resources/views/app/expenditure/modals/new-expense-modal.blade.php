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

            <form id="" autocomplete="off" method="POST" action="{{ route('create-expense') }}">
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
                            <div class="form-group">
                                <label for="" class="form-label">Date</label>
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="date"
                                    id="date"
                                    value="{{ now()->format('Y-m-d') }}"
                                    required />
                            </div>
                        </div>

                    </div>



                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="description"
                            id="description"
                            value=""
                            required />
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-label">Expenditure Header</label>
                                <select
                                    class="form-select form-select-sm select2"
                                    name="header_id"
                                    id="header_id" required>
                                    <option value="">--- Select Header ---</option>

                                    @foreach ($expenditure_headers as $header)
                                    <option value="{{ $header->header_id }}">{{ $header->header_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-label">Account</label>
                                <select class="form-select form-select-sm" name="account_number" required>
                                    <option value="">--- Select Account ---</option>

                                    @foreach ($all_accounts as $account)
                                    <option value="{{ $account->account_number }}">{{ $account->account_name }}</option>
                                    @endforeach
                                </select>
                            </div>
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
