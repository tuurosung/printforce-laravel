<div id="edit-customer-modal"
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <x-modals.modal-header  modalId="edit-customer-modal" modalTitle="Edit Customer"/>
            <form id="" autocomplete="off" method="POST" action="{{ route('customers.customer.update', $customer) }}">
                @csrf
                @method('patch')

                <div class="p-4 overflow-y-auto">

                    <div class="mb-8">
                        <label for="name" class="form-label mb-3 block text-black text-sm">Customer's Name</label>
                        <input
                            type="text"
                            class="form-control  py-2.5 px-4"
                            name="name"
                            id="name"
                            value="{{ $customer->name}}"
                            placeholder="Customer's Name"
                            required />
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="col">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input
                                    type="text"
                                    class="form-control   py-2.5 px-4""
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
                                    class="form-control form-select-sm"
                                    name="category"
                                    id="category"
                                    required>

                                    <option value="">--</option>
                                    @foreach (App\Helpers\CustomerHelper::$customerCategory as $key => $value)
                                    <option value="{{ $key }}" {{ $customer->category->value == $key ? 'selected' : '' }}>{{ $value}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <x-modals.modal-footer btnLabel="Update Customer" modalId="edit-customer-modal" />

            </form>

        </div>
    </div>
</div>
