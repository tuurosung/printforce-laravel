<div
    class="modal fade"
    id="editCustomerModal"
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
                    Edit Customer Information
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="" autocomplete="off" method="POST" action="{{ route('customers.customer.update', $customer) }}">
                @csrf
                @method('patch')

                <div class="modal-body py-4">

                    <div class="mb-3">
                        <label for="name" class="form-label">Customer's Name</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="name"
                            id="name"
                            value="{{ $customer->name}}"
                            placeholder="Customer's Name"
                            required />
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="phone"
                                    id="phone"
                                    value="{{ $customer->phone}}"
                                    required />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="category" class="form-label">Customer Category</label>
                                <select
                                    class="form-select form-select-sm"
                                    name="category"
                                    id="category"
                                    required>

                                    <option value="">--</option>
                                    @foreach (App\Helpers\CustomerHelper::$customerCategory as $key => $value)
                                    <option value="{{ $key }}" {{ $customer->category == $key ? 'selected' : '' }}>{{ $value}}</option>
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
                        <i class="fas fa-check me-3"></i>
                        Update Customer
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
