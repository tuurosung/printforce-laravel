<div class="modal fade" id="newInvoiceModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Customer Invoice
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('invoices.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="customer_id" class="form-label">Customer</label>
                                <select class="form-select select2-input" name="customer_id" id="customerId" required>
                                    @if (isset($customer))
                                        <option value="{{ $customer->customer_id }}" selected>{{ $customer->name }}</option>
                                    @else
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->customer_id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="invoice_type" class="form-label">Invoice Type</label>
                                <select class="form-select" name="invoice_type" id="invoice_type" required>
                                    <option value="">--- Select one ---</option>
                                    @foreach (\App\Enums\Invoices\InvoiceTypeEnum::options() as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="invoice_date" class="form-label">Invoice Date</label>
                                <input type="text" class="form-control datepicker-input" name="invoice_date"
                                    id="invoice_date" aria-describedby="helpId" value="{{ now()->format('Y-m-d') }}"
                                    required />
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input type="text" class="form-control datepicker-input" name="due_date" id="due_date"
                                    aria-describedby="helpId" value="{{ now()->addDays(14)->format('Y-m-d') }}"
                                    required />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Add Invoice Items <i
                            class="fi fi-rr-arrow-right ms-3"></i> </button>
                </div>
            </form>
        </div>
    </div>
</div>
