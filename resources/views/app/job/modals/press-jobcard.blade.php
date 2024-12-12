

<?php
require_once '../../_load.php';
require_once $appLink . 'includes/autoload.php';

if (!isset($_POST)) {
    exit;
}

$q = new DataBase();
$seagate = new SeaGate();
$customer = new Customer($q->db, $q->mysqli);
$service = new Service($q->db, $q->mysqli);
$job = new Job($q->db, $q->mysqli);
$s = new Subscriber($q->db, $q->mysqli);

$_POST = array_map([$seagate, 'Clean'], $_POST);

$job->job_id = $_POST['job_id'];
$job->JobInfo();

$customer->customer_id = $job->customer_id;
$customer->CustomerInfo();

$service->service_id = $job->service_id;
$service_info = $service->ServiceInfo();

$prefix = substr($_POST['job_id'], 0, 2);

$s->active_subscriber = $_SESSION['active_subscriber'];
$s->SubscriberInfo();
?>

<div class="modal fade" id="job_info_modal">
    <div class="modal-dialog modal-lg" role="document" style="width:1200px;">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-body pt-5 px-5">


                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <h4 class="Axiforma fs-24px m-0"><?php echo $s->company_name; ?></h4>
                        <p>Your Print Company Tagline Will Go Here</p>
                    </div>
                    <div>
                        <div class="text-align-right">
                            <p class="m-0 text-end"><?php echo $s->company_address; ?></p>
                            <p class="m-0 text-end"><?php echo $s->company_phone; ?></p>
                            <p class="m-0 text-end"><?php echo $s->company_email; ?></p>
                            <p class="m-0 text-end"><span class="fw-600">VAT/TAX ID :</span> ######</p>
                            <p class="m-0 text-end"><span class="fw-600"> Reg # :</span> #########</p>
                        </div>

                    </div>
                </div>

                <div class="d-flex mb-3">
                    <span class=" w-80px">Invoice ID :</span>
                    <span class="fw-600"><?php echo $job->job_id; ?></span>
                </div>
                <div class="d-flex">
                    <span class=" w-80px">Customer :</span>
                    <span class="fw-600"><?php echo $customer->name; ?></span>
                </div>
                <div class="d-flex">
                    <span class=" w-80px"></span>
                    <span class="">customer@email.com</span>
                </div>
                <div class="d-flex mb-3">
                    <span class=" w-80px"></span>
                    <span class=""><?php echo $customer->phone; ?></span>
                </div>
                <div class="d-flex">
                    <span class=" w-80px">Date</span>
                    <span class="fw-600"><?php echo $job->date; ?></span>
                </div>

                <!-- Job Card Header Begin -->


                <hr class=" border-2 border-black my-4">



                <!-- Job Card Header End -->
                <?php if ($prefix == 'LF') : ?>

                    <div class="mb-3">
                        <div>

                            <p class="fs-18px fw-600"> Large Format Job ( <?php echo $service_info['service_name']; ?> ) </p>

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
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $job->job_id; ?></td>
                                <td><?php echo $service->service_name; ?></td>
                                <td><?php echo $job->cost; ?></td>
                                <td><?php echo $job->width; ?></td>
                                <td><?php echo $job->height; ?></td>
                                <td><?php echo $job->premium; ?></td>
                                <td><?php echo $job->discount; ?></td>
                                <td class="font-weight-bold text-right"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-right">Sub - Total (GHS)</td>
                                <td class="text-right"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-right">VAT(GHS)</td>
                                <td class="text-right">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-right">Grand Total </td>
                                <td class="text-right font-weight-bold" style="font-size:0.9rem"><?php echo $job->total; ?></td>
                            </tr>
                        </tbody>
                    </table>




                <?php
                elseif ($prefix == 'EM') :
                ?>
                    <div class="mb-3">
                        <div>

                            <p class="fs-14px fw-600"> Embroidery Job ( <?php echo $service_info['service_name']; ?> ) </p>

                        </div>
                        <div>

                        </div>
                    </div>

                    <table class="table table-secondary">
                        <thead class="">
                            <tr>
                                <th>Unit Cost</th>
                                <th>Qty</th>
                                <th>Embr. Cost</th>
                                <th>Mat. Unit</th>
                                <th>Purchase Cost</th>
                                <th class="text-right">Total Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $job->unit_cost; ?></td>
                                <td><?php echo $job->qty; ?></td>
                                <td><?php echo $job->embroidery_cost; ?></td>
                                <td><?php echo $job->mat_unit_cost; ?></td>
                                <td><?php echo $job->purchase_cost; ?></td>
                                <td class="font-weight-bold text-right"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">Sub - Total (GHS)</td>
                                <td class="text-right"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">VAT(GHS)</td>
                                <td class="text-right">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">Grand Total </td>
                                <td class="text-right font-weight-bold" style="font-size:0.9rem"><?php echo $job->total; ?></td>
                            </tr>
                        </tbody>
                    </table>


                <?php
                elseif ($prefix == 'PH') :
                ?>
                    <div class="mb-3">
                        <div>

                            <p class="fs-14px fw-600"> Photography Job ( <?php echo $service_info['service_name']; ?> ) </p>

                        </div>
                        <div>

                        </div>
                    </div>

                    <table class="table table-condensed">
                        <thead class="table-dark">
                            <tr>
                                <th>Job ID</th>
                                <th>Description</th>
                                <th>Unit Cost</th>
                                <th>Copies</th>
                                <th>Total Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $job->job_id; ?></td>
                                <td><?php echo $service->service_name; ?></td>
                                <td><?php echo $job->unit_cost; ?></td>
                                <td><?php echo $job->copies; ?></td>
                                <td class="font-weight-bold"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-right">Sub - Total (GHS)</td>
                                <td class="text-right"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-right">VAT(GHS)</td>
                                <td class="text-right">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="text-right">Grand Total </td>
                                <td class="text-right font-weight-bold" style="font-size:0.9rem"><?php echo $job->total; ?></td>
                            </tr>
                        </tbody>
                    </table>


                <?php
                elseif ($prefix == 'DE') :
                ?>
                    <div class="mb-3">
                        <div>

                            <p class="fs-14px fw-600"> Design Job ( <?php echo $service_info['service_name']; ?> ) </p>

                        </div>
                        <div>

                        </div>
                    </div>

                    <table class="table table-secondary">
                        <thead class="">
                            <tr>
                                <th>Description</th>
                                <th>Unit Cost</th>
                                <th>Copies</th>
                                <th class="text-right">Total Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $service_info['service_name']; ?></td>
                                <td><?php echo $job->unit_cost; ?></td>
                                <td><?php echo $job->copies; ?></td>
                                <td class="font-weight-bold text-right"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Sub - Total (GHS)</td>
                                <td class="text-right"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">VAT(GHS)</td>
                                <td class="text-right">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Grand Total </td>
                                <td class="text-right font-weight-bold" style="font-size:0.9rem"><?php echo $job->total; ?></td>
                            </tr>
                        </tbody>
                    </table>

                <?php
                elseif ($prefix == 'PR') :
                ?>

                    <div class="mb-3">
                        <div>

                            <p class="fs-14px fw-600"> Press Job ( <?php echo $service_info['service_name']; ?> ) </p>

                        </div>
                        <div>

                        </div>
                    </div>

                    <table class="table table-condensed">
                        <thead class="table-dark">
                            <tr>
                                <th>Job ID</th>
                                <th>Description</th>
                                <th>Unit Cost</th>
                                <th>Copies</th>
                                <th>Total Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $job->job_id; ?></td>
                                <td><?php echo $service->service_name; ?></td>
                                <td><?php echo $job->unit_cost; ?></td>
                                <td><?php echo $job->copies; ?></td>
                                <td class="font-weight-bold"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">Sub - Total (GHS)</td>
                                <td class="text-right"><?php echo $job->total; ?></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">VAT(GHS)</td>
                                <td class="text-right">0.00</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">Grand Total </td>
                                <td class="text-right font-weight-bold" style="font-size:0.9rem"><?php echo $job->total; ?></td>
                            </tr>
                        </tbody>
                    </table>

                <?php endif; ?>

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

                <hr class="mx-auto" style="border-top:dashed 1px #000; width:90%;">

                <div class="mx-auto text-center">
                    <p>Powered By PrintForce Ltd</p>
                    <p>Office 06, Farhabink Storey - Gurugu Road. Tamale - NR</p>
                    <p>Email: info@printforcepos.com | www.printforcepos.com | Phone: 0246173282</p>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" data-bs-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
