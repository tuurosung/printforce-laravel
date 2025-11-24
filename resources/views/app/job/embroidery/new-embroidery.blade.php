<div class="modal fade" id="new_embroidery_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    New Embroidery Job
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('jobs.embroidery.store', $customer) }}" autocomplete="off">
                @csrf

                <div class="modal-body">

                    <section class="mb-3">
                        <h6 class="mb-3">Job Details</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control" name="customer_name" id="customer_name"
                                        aria-describedby="" placeholder="" value="{{ $customer->name }}" readonly />
                                </div>

                            </div>
                            <div class="col-md-6">
                                <x-printforce.inputs.date-input name="date" id="embroidery_date" label="Job Date"
                                    required />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="service_id" class="form-label">Service Name</label>
                                    <select class="form-select select2-input" name="service_id" id="embroidery_service_id"
                                        data-fetch_url="{{ route('configuration.print-services.get-service-cost-with-customer-id') }}"
                                        data-customer_id="{{ $customer->customer_id }}" required>
                                        <option value="">--- Select one ---</option>
                                        @foreach ($embroidery_services as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <x-printforce.inputs.text-input name="unit_cost" id="embroidery_unit_cost"
                                    label="Unit Cost" placeholder="0.00" readonly="true" />
                            </div>
                        </div>

                    </section>


                    <section class="mb-3">

                        <h6 class="mb-3">Production Details</h6>

                        <div class="p-3 bg-light rounded-3">

                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-printforce.inputs.text-input name="qty" id="embroidery_qty" label="Quantity" value="1" required />
                                        </div>
                                        <div class="col-md-6">
                                            <x-printforce.inputs.text-input name="embroidery_cost" id="embroidery_cost" label="Embroidery Cost"
                                                placeholder="0.00" readonly="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Material Purchase</label>
                                                <select class="form-select form-select-sm" name="mat_supply" id="mat_supply" required>
                                                    <option value="">-- Who is buying the materials? --</option>
                                                    <option value="yes">Company Purchase</option>
                                                    <option value="no">Client Provide</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <x-printforce.inputs.text-input name="mat_unit_cost" id="mat_unit_cost" label="Material Unit Cost"
                                                placeholder="0.00" required />
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="row">
                                <div class="col-6">
                                    <x-printforce.inputs.text-input name="purchase_cost" id="embroidery_purchase_cost"
                                        label="Material Purchase Cost" placeholder="0.00" readonly required />
                                </div>
                                <div class="col-md-6">
                                    <x-printforce.inputs.text-input name="total" id="embroidery_total"
                                        label="Overall Cost" placeholder="0.00" readonly />
                                </div>
                            </div>

                        </div>



                    </section>

                    <section class="mb-3">
                        <h6 class="mb-3">Additional Details</h6>
                        <x-printforce.inputs.text-input name="notes" id="em_notes"
                            label="Notes (optional eg; CRS Farmers T-shirts)" placeholder="" />
                    </section>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-3  "></i>
                        Create Embroidery Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
