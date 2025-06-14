<div
    class="modal fade"
    id="new_supplier_modal"
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
                    Create New Supplier
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="" method="POST" action="{{ route('suppliers.store') }}" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="" class="form-label">Company Name</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="supplier_name"
                            id="supplier_name"
                            value=""
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Phone Number</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="supplier_phone"
                            id="supplier_phone"
                            value=""
                            required />
                    </div>


                    <div class="form-group">
                        <label for="" class="form-label">Address</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="supplier_address"
                            id="supplier_address"
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
                        <i class="fas fa-check me-3"></i>
                        Create Supplier
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
