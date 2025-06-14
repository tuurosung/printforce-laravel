<div
    class="modal fade"
    id="new_purchase_modal"
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
                    Create New Purchase Invoice
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="" autocomplete="off" method="POST" action="{{ route('purchases.store') }}">
                @csrf
                <div class="modal-body">

                    <input
                        type="hidden"
                        class="form-control form-control-sm"
                        name="supplier_id"
                        id="supplier_id"
                        value="{{ $supplier->supplier_id }}"
                        readonly />



                    <div class="mb-3">
                        <label for="" class="form-label">Reference</label>
                        <input
                            type="text"
                            name="reference"
                            id="reference"
                            class="form-control form-control-sm"
                            placeholder="AM/5209">
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <x-printforce.inputs.date-input
                                name="date_issued"
                                id="date_issued"
                                label="Date Issued"
                                required="true" />
                        </div>

                        <div class="col-6">
                            <x-printforce.inputs.date-input
                                name="due_date"
                                id="due_date"
                                label="Due Date"
                                value="{{ now()->addDays(30)->format('Y-m-d') }}"
                                required="true" />
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Footnotes</label>
                        <textarea
                            class="form-control form-control-sm"
                            rows="2" cols="2"
                            name="notes"
                            id="notes"
                            placeholder="Stock For July"
                            required></textarea>
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
                        Create Invoice
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
