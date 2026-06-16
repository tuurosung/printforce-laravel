<x-modals.modal modalId="new-invoice-item-modal">

    <form method="POST" action="{{ route('invoices.invoice-items.store', $customerInvoice) }}">
        @csrf
        <x-modals.modal-header modalTitle="Add New Invoice Item" modalId="new-invoice-item-modal" />

            <div class="p-6">

                <input type="hidden" name="service_category_id" id="serviceCategoryId" value="">

                <div class="grid grid-cols-12 gap-6">

                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="">
                            <label for="serviceId" class="form-label">Service</label>
                            <select class="form-control form-select-sm" name="service_id" id="serviceId" required
                                data-fetch-url="{{ route('configuration.print-services.fetch-service-detail') }}">
                                <option value="" selected>--- Select Service ---</option>
                                @foreach ($printServices as $service)
                                    <option value="{{ $service->service_id }}">{{ $service->service_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="">
                            <label for="cost" class="form-label">Unit Cost</label>
                            <input type="text" class="form-control st" name="unit_cost" id="unitCost" readonly required />
                        </div>
                    </div>
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="">
                            <label for="" class="form-label">Width</label>
                            <input type="number" step="any" class="form-control" name="width" id="width" required />
                        </div>
                    </div>
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="">
                            <label for="" class="form-label">Height</label>
                            <input type="number" step="any" class="form-control " name="height" id="height" required />
                        </div>
                    </div>
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="mb-3">

                            <label for="" class="form-label">Measurement</label>
                            <select class="form-control form-select-sm" name="measuring_unit" id="measuringUnit" required>

                                <option value="ft">Feet</option>
                                <option value="inch">Inch</option>

                            </select>

                        </div>
                    </div>
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="mb-3">
                                    <label for="" class="form-label">Quantity</label>
                                    <input type="number" class="form-control " name="quantity" id="quantity"
                                        placeholder="Quantity" min="1" value="1" required />
                                </div>
                    </div>


                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="mb-3">
                            <label for="sub_total" class="form-label">Sub-Total</label>
                            <input type="number" class="form-control" name="sub_total" id="subTotal" aria-describedby="helpId" placeholder=""
                                readonly />
                        </div>
                    </div>
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="mb-3">
                            <label for="material_unit_cost" class="form-label">Material Unit Cost</label>
                            <input type="number" class="form-control" name="material_unit_cost" id="materialUnitCost" aria-describedby=""
                                placeholder="" />
                        </div>
                    </div>
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="mb-3">
                            <label for="material_total_cost" class="form-label">Material Total Cost</label>
                            <input type="number" class="form-control" name="material_total_cost" id="materialTotalCost" aria-describedby=""
                                placeholder="" readonly />
                        </div>
                    </div>
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Total Cost</label>
                            <input type="text" class="form-control" name="total" id="total" readonly required />
                        </div>
                    </div>

                </div>

            </div>

        <x-modals.modal-footer modalId="new-invoice-item-modal" btnLabel="Add Item" />
    </form>

</x-modals.modal>

