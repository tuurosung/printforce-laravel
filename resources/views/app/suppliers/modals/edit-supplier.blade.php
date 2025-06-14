<div
    class="modal fade"
    id="edit_supplier_modal"
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
                    Edit Supplier
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="" method="POST" action="{{ route('suppliers.update', $supplier) }}" autocomplete="off">
                @csrf
                @method('patch')
                <div class="modal-body">

                    <input
                        type="hidden"
                        name="supplier_id"
                        id="supplier_id"
                        value="{{ $supplier->supplier_id }}"
                        required>

                    <div class="mb-3">
                        <label for="" class="form-label">Company Name</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="supplier_name"
                            id="supplier_name"
                            value="{{ $supplier->supplier_name }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Phone Number</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="supplier_phone"
                            id="supplier_phone"
                            value="{{ $supplier->supplier_phone }}"
                            required />
                    </div>


                    <div class="form-group">
                        <label for="" class="form-label">Address</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="supplier_address"
                            id="supplier_address"
                            value="{{ $supplier->supplier_address }}"
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
                        Update Supplier Information
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
