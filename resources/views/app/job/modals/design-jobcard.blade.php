<div
    class="modal fade"
    id="jobCardModal"
    tabindex="-1"

    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div
        class="modal-dialog modal-lg"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Job Card
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="d-flex justify-content-between">
                    <div>
                        <div>
                            <h5 class="mb-2">Bill To</h5>

                            <h6 class="h6">{{ $designJob->customer->name }}</h6>
                            <p class="mb-1">customer@email.com</p>
                            <p class="mb-1">{{ $designJob->customer->address }}</p>
                            <p class="mb-1">{{ $designJob->customer->phone }}</p>
                            <p class="mb-1"></p>

                        </div>
                    </div>
                    <div class="text-end">
                        <div class="text-align-end">

                            <p class="mb-1">Job ID : <span class="fw-600">#DES{{ $designJob->sn }}</span></p>
                            <p class="mb-1">Date : <span class="fw-600"> {{ date('M-d, Y', strtotime($designJob->date)) ?? $designJob->created_at->format('M-d, Y') }} </span></p>
                            <p class="mb-1"></p>
                            <p class="mb-1"></p>
                            <p class="m-0 text-end"><span class="fw-600">VAT/TAX ID :</span> ######</p>
                            <p class="m-0 text-end"><span class="fw-600"> Reg # :</span> #########</p>
                        </div>
                    </div>
                </div>


                <!-- Job Card Header Begin -->

                <hr class=" border-2 border-black my-4">

                <div class="mb-3">
                    <div>

                        <p class="fs-16px fw-600 text-primary"> Design Job ( {{ $designJob->service->service_name }} ) </p>

                    </div>
                    <div>

                    </div>
                </div>



                <table class="table table-sm">
                    <thead class="">
                        <tr>
                            <th>Description</th>
                            <th>Unit Cost</th>
                            <th>Copies</th>
                            <th class="text-end">Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $designJob->service->service_name }}</td>
                            <td>{{ number_format($designJob->unit_cost,2) }}</td>
                            <td><?php echo $designJob->copies; ?></td>
                            <td class="font-weight-bold text-end">{{ number_format($designJob->total,2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end">Sub - Total (GHS)</td>
                            <td class="text-end">{{ number_format($designJob->total,2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end">VAT(GHS)</td>
                            <td class="text-end">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end">Grand Total </td>
                            <td class="text-end fw-600" style="font-size:0.9rem">{{ number_format($designJob->total,2) }}</td>
                        </tr>
                    </tbody>
                </table>


                <hr class=" border-2 border-black my-4">


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


            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-dismiss="modal"
                    data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-print me-3  "></i>
                    Print
                </button>
            </div>
        </div>
    </div>
</div>
