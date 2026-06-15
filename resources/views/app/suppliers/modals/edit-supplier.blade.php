<x-modals.modal modalId="edit-supplier-modal">

    <x-modals.modal-header modalId="edit-supplier-modal" modalTitle="Edit Supplier" />

    <form id="" method="POST" action="{{ route('suppliers.update', $supplier) }}" autocomplete="off">
        @csrf
        @method('patch')

        <div class="p-6">

            <input type="hidden" name="supplier_id" id="supplier_id" value="{{ $supplier->supplier_id }}" required>

            <div class="mb-5">
                <label for="" class="form-label">Company Name</label>
                <input type="text" class="form-control" name="supplier_name" id="supplier_name"
                    value="{{ $supplier->supplier_name }}" required>
            </div>


            <div class="grid grid-cols-12 gap-6 mb-5">

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="supplier_phone" id="supplier_phone"
                            value="{{ $supplier->supplier_phone }}" required />
                    </div>

                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="form-group">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" name="supplier_address" id="supplier_address"
                            value="{{ $supplier->supplier_address }}" required />
                    </div>
                </div>

            </div>


        </div>

        <x-modals.modal-footer modalId="edit-supplier-modal" btnLabel="Update Supplier" />
    </form>

</x-modals.modal>
