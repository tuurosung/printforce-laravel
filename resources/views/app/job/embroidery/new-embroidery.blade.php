<div
    class="modal fade"
    id="new_embroidery_job_modal"
    tabindex="-1"

    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div
        class="modal-dialog modal-xl"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    New Embroidery Job
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('jobs.embroidery.store', $customer) }}" autocomplete="off">
                @csrf

                <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <div class="card card-primary border-primary mb-4">
                                <div class="card-body">

                                    <h6 class="mb-4">Job Details </h6>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-printforce.inputs.date-input name="date" id="embroidery_date" label="Job Date" required />
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col">

                                            <x-printforce.inputs.select-input name="service_id" id="em_services" label="Service Name"
                                                :options="$embroidery_services"  required />


                                        </div>
                                        <div class="col-md-6">
                                            <x-printforce.inputs.text-input name="unit_cost" id="embroidery_unit_cost" label="Unit Cost" placeholder="0.00" readonly="true" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-printforce.inputs.text-input name="qty" id="embroidery_qty" label="Quantity" placeholder="1" required />
                                        </div>
                                        <div class="col-md-6">
                                            <x-printforce.inputs.text-input name="embroidery_cost" id="embroidery_cost" label="Embroidery Cost" placeholder="0.00" readonly="true" />
                                        </div>
                                    </div>

                                    <x-printforce.inputs.text-input name="notes" id="em_notes" label="Notes (optional eg; CRS Farmers T-shirts)" placeholder="" />

                                </div>
                            </div>
                        </div>

                        <div class="col">

                            <div class="card card-warning border-warning">
                                <div class="card-body">

                                    <h6 class="mb-4">Production Details</h6>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Material Purchase</label>
                                                <select
                                                    class="form-select form-select-sm"
                                                    name="mat_supply"
                                                    id="mat_supply">
                                                    <option value="">-- Who is buying the materials? --</option>
                                                    <option value="yes">Company Purchase</option>
                                                    <option value="no">Client Provide</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <x-printforce.inputs.text-input name="mat_unit_cost" id="mat_unit_cost" label="Material Unit Cost" placeholder="0.00" required />
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <x-printforce.inputs.text-input name="purchase_cost" id="embroidery_purchase_cost" label="Material Purchase Cost" placeholder="0.00" readonly required />
                                        </div>
                                        <div class="col-md-6">
                                            <x-printforce.inputs.text-input name="total" id="embroidery_total" label="Overall Cost" placeholder="0.00" readonly />
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
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
