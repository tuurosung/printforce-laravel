<x-modals.modal modalId="new-supplier-modal">

    <x-modals.modal-header modalId="new-supplier-modal" modalTitle="Create New Supplier" />
    <form id="" method="POST" action="{{ route('suppliers.store') }}" autocomplete="off">
        @csrf
        <div class="p-6">

            <div class="mb-8">
                <label for="" class="form-label">Company Name</label>
                <input type="text" class="form-control" name="supplier_name" id="supplier_name" value="" required>
            </div>


            <div class="grid grid-cols-12 gap-6 mb-8">

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <label for="" class="form-label">Address</label>
                        <input type="text" class="form-control" name="supplier_address" id="supplier_address" value="" required />
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="supplier_phone" id="supplier_phone" value="" required />
                    </div>
                </div>
            </div>


        </div>
        <x-modals.modal-footer btnLabel="Create Supplier" modalId="new-supplier-modal" />

    </form>

</x-modals.modal>
