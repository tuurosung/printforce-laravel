<x-modals.modal modalId="new-invoice-modal">

    <x-modals.modal-header modalId="new-invoice-modal" modalTitle="Create New Invoice" />
    <form method="POST" action="{{ route('invoices.store') }}">
        @csrf
        <div class="p-6 overflow-y-auto">
            <div class="modal-body">

                <div class="grid grid-cols-2 gap-6 mb-5">
                    <div class="col">
                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Customer</label>
                            <select class="form-control" name="customer_id" id="customerId" required>
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
                    <div class="col">
                        <div class="mb-3">
                            <label for="invoice_type" class="form-label">Invoice Type</label>
                            <select class="form-control" name="invoice_type" id="invoice_type" required>
                                <option value="">--- Select one ---</option>
                                @foreach (\App\Enums\Invoices\InvoiceTypeEnum::options() as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="col">
                        <div class="mb-3">
                            <label for="invoice_date" class="form-label">Invoice Date</label>
                            <input type="text" class="form-control datepicker-input" name="invoice_date"
                                id="invoice_date" aria-describedby="helpId" value="{{ now()->format('Y-m-d') }}"
                                required />
                        </div>

                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="text" class="form-control datepicker-input" name="due_date" id="due_date"
                                aria-describedby="helpId" value="{{ now()->addDays(14)->format('Y-m-d') }}" required />
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <x-modals.modal-footer btnLabel="Add Invoice Items" modalId="new-invoice-modal" />

    </form>
</x-modals.modal>
