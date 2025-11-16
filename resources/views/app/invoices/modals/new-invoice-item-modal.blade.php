<div class="modal fade" id="newInvoiceItemModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Add New Item
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('invoices.invoice-items.store', $customerInvoice) }}">
                @csrf

                <div class="modal-body">

                <input type="hidden" name="service_category_id" id="serviceCategoryId" value="">


                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="serviceId" class="form-label">Service</label>
                                <select class="form-select form-select-sm" name="service_id" id="serviceId" required data-fetch-url="{{ route('configuration.print-services.fetch-service-detail') }}">
                                    <option value="" selected>--- Select Service ---</option>
                                    @foreach ($printServices as $service)
                                    <option value="{{ $service->service_id }}">{{ $service->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="cost" class="form-label">Unit Cost</label>
                                <input type="text" class="form-control form-control-sm" name="unit_cost" id="unitCost"
                                    readonly required />
                            </div>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Width</label>
                                        <input type="number" step="any" class="form-control form-control-sm"
                                            name="width" id="width" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Height</label>
                                        <input type="number" step="any" class="form-control form-control-sm"
                                            name="height" id="height" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">

                                        <label for="" class="form-label">Measurement</label>
                                        <select class="form-select form-select-sm" name="measuring_unit"
                                            id="measuringUnit" required>

                                            <option value="ft">Feet</option>
                                            <option value="inch">Inch</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Quantity</label>
                                        <input type="number" class="form-control form-control-sm" name="quantity"
                                            id="quantity" placeholder="Quantity" min="1" value="1"
                                            required />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="sub_total" class="form-label">Sub-Total</label>
                                        <input type="number" class="form-control" name="sub_total" id="subTotal"
                                            aria-describedby="helpId" placeholder="" readonly/>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="material_unit_cost" class="form-label">Material Unit Cost</label>
                                        <input type="number" class="form-control" name="material_unit_cost"
                                            id="materialUnitCost" aria-describedby="" placeholder="" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="material_total_cost" class="form-label">Material Total Cost</label>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="material_total_cost"
                                            id="materialTotalCost"
                                            aria-describedby=""
                                            placeholder=""
                                            readonly
                                        />
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Total Cost</label>
                                        <input type="text" class="form-control form-control-sm" name="total"
                                            id="total" readonly required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-3  "></i>
                        Add Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
