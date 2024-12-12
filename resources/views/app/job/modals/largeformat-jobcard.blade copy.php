<div
    class="modal fade"
    id="jobCardModal"
    tabindex="-1"

    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div
        class="modal-dialog"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Job Card
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <h4 class="Axiforma fs-24px m-0">{{ Auth::user()->company->company_name }}</h4>
                        <p>Your Print Company Tagline Will Go Here</p>
                    </div>
                    <div>
                        <div class="text-align-end">
                            <p class="m-0 text-end">{{ Auth::user()->company->company_address }}</p>
                            <p class="m-0 text-end">{{ Auth::user()->company->company_phone }}</p>
                            <p class="m-0 text-end">{{ Auth::user()->company->company_email }}</p>
                            <p class="m-0 text-end"><span class="fw-600">VAT/TAX ID :</span> ######</p>
                            <p class="m-0 text-end"><span class="fw-600"> Reg # :</span> #########</p>
                        </div>

                    </div>
                </div>

                <div class="d-flex mb-3">
                    <span class=" w-80px">Invoice ID :</span>
                    <span class="fw-600">{{ $largeFormatJob->job_id }}</span>
                </div>
                <div class="d-flex">
                    <span class=" w-80px">Customer :</span>
                    <span class="fw-600">{{ $largeFormatJob->customer->name }}</span>
                </div>
                <div class="d-flex">
                    <span class=" w-80px"></span>
                    <span class="">customer@email.com</span>
                </div>
                <div class="d-flex mb-3">
                    <span class=" w-80px"></span>
                    <span class="">{{ $largeFormatJob->customer->phone }}</span>
                </div>
                <div class="d-flex">
                    <span class=" w-80px">Date</span>
                    <span class="fw-600">{{ $largeFormatJob->date ?? $largeFormatJob->created_at }}</span>
                </div>

                <!-- Job Card Header Begin -->


                <hr class=" border-2 border-black my-4">



                <div class="mb-3">
                    <div>

                        <p class="fs-18px fw-600"> Large Format Job ( {{ $largeFormatJob->service->service_name }} ) </p>

                    </div>
                    <div>

                    </div>
                </div>

                <table class=" table table-secondary">
                    <thead class="">
                        <tr>
                            <th>Job ID</th>
                            <th>Description</th>
                            <th>Unit Price</th>
                            <th>Width</th>
                            <th>Height</th>
                            <th>Premium</th>
                            <th>Discount</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $largeFormatJob->job_id }}</td>
                            <td>{{ $largeFormatJob->service->service_name }}</td>
                            <td>{{ $largeFormatJob->cost }}</td>
                            <td>{{ $largeFormatJob->width }}</td>
                            <td>{{ $largeFormatJob->height }}</td>
                            <td>{{ $largeFormatJob->premium }}</td>
                            <td>{{ $largeFormatJob->discount }}</td>
                            <td class="fw-600 text-end">{{ $largeFormatJob->total }}</td>
                        </tr>
                        <tr>
                            <td colspan="7" class="text-end">Sub - Total (GHS)</td>
                            <td class="text-end">{{ $largeFormatJob->total }}</td>
                        </tr>
                        <tr>
                            <td colspan="7" class="text-end">VAT(GHS)</td>
                            <td class="text-end">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="7" class="text-end">Grand Total </td>
                            <td class="text-end font-weight-bold" style="font-size:0.9rem">{{ $largeFormatJob->total }}</td>
                        </tr>
                    </tbody>
                </table>



                <div class="d-flex justify-content-between mt-5">
                    <div>

                        <div>
                            <i class="fas fa-signature fa-2x text-primary "></i>
                            <p>Front Desk Officer</p>
                            <p class="fs-8px">This is a digital signature</p>
                        </div>

                    </div>
                    <div>

                    </div>
                </div>

                <hr class="mx-auto" style="border-top:dashed 1px #000; width:90%;">

                <div class="mx-auto text-center">
                    <p>Powered By PrintForce Ltd</p>
                    <p>Office 06, Farhabink Storey - Gurugu Road. Tamale - NR</p>
                    <p>Email: info@printforcepos.com | www.printforcepos.com | Phone: 0246173282</p>
                </div>



            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
