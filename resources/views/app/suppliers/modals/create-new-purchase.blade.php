<x-modals.modal modalId="new-purchase-modal">

    <x-modals.modal-header modalId="new-purchase-modal" modalTitle="Create New Purchase Invoice" />

    <form id="" autocomplete="off" method="POST" action="{{ route('purchases.store', $supplier) }}">
        @csrf
        <div class="p-6">

            <input type="hidden" class="form-control" name="supplier_id" id="supplier_id"
                value="{{ $supplier->supplier_id }}" readonly />

            <div class="grid grid-cols-12 gap-6 mb-5">

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <label for="" class="form-label">Reference</label>
                        <input type="text" name="reference" id="reference" class="form-control" placeholder="AM/5209">
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12"></div>

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <x-printforce.inputs.date-input name="date_issued" id="date_issued" label="Date Issued" required="true" />
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <x-printforce.inputs.date-input name="due_date" id="due_date" label="Due Date"
                            value="{{ now()->addDays(30)->format('Y-m-d') }}" required="true" />
                    </div>
                </div>

                <div class="lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                    <div class="form-group">
                        <label for="" class="form-label">Footnotes</label>
                        <textarea class="form-control" rows="2" cols="2" name="notes" id="notes" placeholder="Stock For July"
                            required></textarea>
                    </div>
                </div>
            </div>



        </div>

        <x-modals.modal-footer modalId="new-purchase-modal" btnLabel="Create Invoice" />
    </form>

</x-modals.modal>
