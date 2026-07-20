<x-modals.modal modalId="new-customer-modal">
    <x-modals.modal-header modalId="new-customer-modal" modalTitle="New Customer" />

    <form id="" autocomplete="off" method="POST" action="{{ route('customers.customer.store') }}">
        @csrf
        <div class="p-6">

            <div class="mb-8">
                <label for="name" class="form-label mb-3 block text-black text-sm">Customer's Name</label>
                <input type="text" class="form-control  py-2.5 px-4" name="name" id="name" placeholder=""
                    autofocus required />
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="col">
                    <div class="mb-3">
                        <label for="phone" class="form-label block mb-3 text-black">Phone</label>
                        <input type="text" class="form-control " name="phone" id="phone" required />
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="category" class="form-label block mb-3 text-black!">Customer
                            Category</label>
                        <select class="form-control form-select-sm" name="category" id="category" required>

                            <option value="">--</option>
                            @foreach (App\Enums\Customers\CustomerCategoryEnum::options() as $key => $value)
                            <option value="{{ $key }}">{{ $value}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </div>

        </div>


        <x-modals.modal-footer modalId="new-customer-modal" btnLabel="Create Customer" />

    </form>
</x-modals.modal>
